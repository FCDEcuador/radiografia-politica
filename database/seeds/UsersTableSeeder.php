<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $users = [
        	[
        		'name'=>'Administrador',
        		'email'=>'rarmas@umpacto.com',
        		'password'=> bcrypt('123456'),
        		'role_id'=>'1'
        	]
        ];

        foreach ($users as $user)
        {
        	User::create($user);
        }
    }
}
