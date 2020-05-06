<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $fillable =['name', 'url', 'price', 'Description'];

     /**
     * Get de Details
     */

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }
    
    /**
     * Get de Modules
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    /**
     * Filtra os plans
     */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                            ->orwhere('Description', 'LIKE', "%{$filter}%")
                            ->paginate();

        return $results;

    }

    /**
     * module not linked with this plan
     */
    public function modulesAvailable($filter = null)
    {
        $modules = Module::whereNotIn('modules.id', function ($query) {
                $query->select('module_plan.module_id');
                $query->from('module_plan');
                $query->whereRaw("module_plan.plan_id={$this->id}");
            })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter && $filter != null)
                    $queryFilter->where('modules.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $modules;
    }
}
