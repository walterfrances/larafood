<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\plan;
use Illuminate\Http\Request;

class PlanModuleController extends Controller
{
    protected $plan, $module;

    public function __construct(Plan $plan, Module $module)
    {
        $this->plan = $plan;
        $this->module = $module;
    }

    /* 
    * Get Modules
    */

    public function modules($idplan)
    {

        $plan = $this->plan->find($idplan);

        if (!$plan) {
            return redirect()->back();
        }

        $modules = $plan->modules()->paginate();

        return view('admin.pages.plans.modules.modules', compact('plan', 'modules'));
    }

    public function plans($idmodule)
    {

        if (!$module = $this->module->find($idmodule)) {
            return redirect()->back();
        }

        $plans = $module->plans()->paginate();

        return view('admin.pages.modules.plans.plans', compact('module', 'plans'));
    }

    public function modulesAvailable(Request $request, $idplan)
    {

        if (!$plan = $this->plan->find($idplan)) {
            return redirect()->back();
        }


        $filters = $request->except('_token');

        $modules = $plan->modulesAvailable($request->filter);

        return view('admin.pages.plans.modules.available', compact('plan', 'modules', 'filters'));
    }

    public function attachmodulesplan(Request $request, $idplan)
    {

        if (!$plan = $this->plan->find($idplan)) {
            return redirect()->back();
        }

        if (!$request->modules || count($request->modules) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Nenhum item selecionado');
        }


        $plan->modules()->attach($request->modules);

        return redirect()->route('plans.modules', $plan->id);
    }

    public function detachPlanModule($idplan, $idmodule)
    {
        $plan = $this->plan->find($idplan);
        $module = $this->module->find($idmodule);

        if (!$plan || !$module) {
            return redirect()
                ->back();
        }

        $plan->modules()->detach($module);

        return redirect()->back();
    }
}
