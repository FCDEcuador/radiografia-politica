<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $states = [
         ['name'=>'Draft'],
         ['name'=>'In Revision'],
         ['name'=>'Published'],
       ];

       foreach ($states as $state)
       {
         State::create($state);
       }
    }
}
