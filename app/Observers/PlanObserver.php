<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Plan;

class PlanObserver
{

    public function creating(Plan $plan)
    {
        $plan->url = str::kebab($plan->name);
    }

    public function updating(Plan $plan)
    {
        $plan->url = str::kebab($plan->name);
    }

    
}
