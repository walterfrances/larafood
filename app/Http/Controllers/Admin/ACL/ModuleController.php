<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Requests\StoreUpdateModule;
use App\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $repository;

    public function __construct(Module $module)
    {
        $this-> repository = $module;
    }

    public function index()
    {
        $modules = $this->repository->paginate();

        return view('admin.pages.modules.index', compact('modules'));
    }

    public function create()
    {
        return view('admin.pages.modules.create');
    }

    public function store(StoreUpdateModule $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('modules.index')->withSuccess('Módulo cadastrado com sucesso!');;
    }

    public function show($id)
    {
        if (!$module = $this->repository->find($id))
            return redirect()->back();


        return view('admin.pages.modules.show', compact('module'));
    }

    public function edit($id)
    {
        if (!$module = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.modules.edit', compact('module'));
    }

    public function update(StoreUpdateModule $request, $id)
    {

        if (!$module = $this->repository->find($id))
            return redirect()->back();

        $module -> update($request->all());

        return redirect()->route('modules.index')->withSuccess('Módulo editado com sucesso!');
    }

    public function destroy($id)
    {
        if (!$module = $this->repository->find($id))
        return redirect()->back();

        $module -> delete();

        return redirect()->route('modules.index')->withSuccess('Módulo deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $modules = $this->repository
                            ->where(function($query) use($request){
                                if ($request->filter){
                                    $query->where('name',$request->filter)
                                            ->orwhere('description','LIKE', "%{$request->filter}%");
                                }

                                         })
                            ->paginate();

        return view('admin.pages.modules.index', compact('modules', 'filters'));
    }
}
