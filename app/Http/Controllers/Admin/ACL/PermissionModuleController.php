<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionModuleController extends Controller
{
    protected $module, $permission;

    public function __construct(Module $module, Permission $permission)
    {
        $this->module = $module;
        $this->permission = $permission;
    }

    public function permissions($idModule)
    {

        $module = $this->module->find($idModule);

        if (!$module)
        {
            return redirect()->back();
        }

        $permissions = $module->permissions()->paginate();
       
        return view('admin.pages.modules.permissions.permissions', compact('module', 'permissions'));
    }
    
    public function modules($idPermission)
    {

        $permission = $this->permission->find($idPermission);

        if (!$permission)
        {
            return redirect()->back();
        }

        $modules = $permission->modules()->paginate();
       
        return view('admin.pages.permissions.modules.modules', compact('permission', 'modules'));
    } 

    public function permissionsAvailable(Request $request, $idModule)
    {

        if (!$module = $this->module->find($idModule))
        {
            return redirect()->back();
        }

        
        $filters= $request->except('_token');
        
        $permissions = $module->permissionsAvailable($request->filter);
       
        return view('admin.pages.modules.permissions.available', compact('module', 'permissions', 'filters'));
    }

    public function attachpermissionsModule(Request $request, $idModule)
    {

        if (!$module = $this->module->find($idModule))
        {
            return redirect()->back();
        }
        
        if (!$request->permissions || count($request->permissions)==0){
            return redirect()
                    ->back()
                    ->with('info', 'Nenhum item selecionado');
        }


        $module->permissions()->attach($request->permissions);

        return redirect()->route('modules.permissions', $module->id);

    }

    public function detachpermissionModule($idModule, $idPermission)
    {
        $module = $this->module->find($idModule);
        $permission = $this->permission->find($idPermission);

        if (!$module || !$permission){
            return redirect()
                    ->back();
        } 

        $module->permissions()->detach($permission);
        
        return redirect()->back();
    }


}
