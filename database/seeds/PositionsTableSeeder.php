<?php

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $positions = [
        ['name'=>'Presidente'],
        ['name'=>'Vicepresidente'],
        ['name'=>'Asambleísta'],
        ['name'=>'Contralor General del Estado'],
        ['name'=>'Defensor del Pueblo']
      ];

      foreach ($positions as $position)
      {
        Position::create($position);
      }
    }
}
