<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

Class TenantObserver
{
    public function creating(Model $model)
    {
        $managerTenant = app(ManagerTenant::class);

        $model->tenant_id = $managerTenant->getTenantIdentify();
        
    }
}