<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Walter Francês',
            'email' => 'walter.frances@sonangol.co.ao',
            'password'=> bcrypt('123456'),

        ]);
    }
}
