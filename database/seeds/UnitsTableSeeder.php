<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $unit  = ['ASO','BGES','CC','CCAN','DAMAN','DSW'];
      for ($i=0; $i <count($unit) ; $i++) {
        DB::table('units')->insert([
            'unit_name' => $unit[$i],
        ]);
      }

    }
}
