<?php

namespace App\Services;

use App\Models\Plan;

class TenantService 
{
    private $plan, $data = [];
    
        public function make(Plan $plan, array $data)
        {
            $this->plan = $plan;
            $this->data = $data;
    
            $tenant = $this->storeTenant();
            
            $user = $this->storeUser($tenant);

            return $user;
        }
    
        public function storeTenant()
        {
            
            $data = $this->data;
    
            $tenant = $this->plan->tenants()->create([
                'nif'   => $data['nif'],
                'name'  => $data['empresa'],
                'email' => $data['email'],
   
                'subscription'  => now(),
                'expires_at'    => now()->addDays(7),
            ]);
            
            dd($tenant);
        }
    
        public function storeUser($tenant)
        {

            $user = $tenant->users()->create([
                'name'      => $this->data['name'],
                'email'     => $this->data['email'],
                'password'  => bcrypt($this->data['password']),
            ]);
    
            return $user;
        }
}

