<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $roles = [
        	['name'=>'Administrador'],
        	['name'=>'Usuario']
        ];

        foreach ($roles as $role)
        {
        	Role::create($role);
        }
    }
}
