<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $plan = Plan::first();

        $plan->tenants()->create([

            'nif' => '23882706000120',
            'name' => 'walterfrances',
            'url' => 'walterfrances',
            'email' => 'walter.frances@sonangol.co.ao',

        ]);
    }
}
