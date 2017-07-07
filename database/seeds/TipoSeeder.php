<?php

use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('tipos')->insert([
          'id_tipo' => 1,
          'descripcion' => 'Ecologico',
          ]);
      \DB::table('tipos')->insert([
          'id_tipo' => 2,
          'descripcion' => 'Tecnologico',
          ]);
      \DB::table('tipos')->insert([
          'id_tipo' => 3,
          'descripcion' => 'Educativo',
          ]);
      \DB::table('tipos')->insert([
          'id_tipo' => 4,
          'descripcion' => 'Pyme',
          ]);
    }
}
