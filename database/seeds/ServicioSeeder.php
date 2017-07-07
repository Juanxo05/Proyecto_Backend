<?php

use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('servicios')->insert([
          'id_servicio' => 1,
          'nombre'		=> 'GESTIÓN INTEGRAL DE SUBSIDIOS DE INNOVACIÓN Y FINANCIAMIENTO',
          'descripcion' => 'Servicio orientado al apoyo de pymes',
          ]);
      \DB::table('servicios')->insert([
          'id_servicio' => 2,
          'nombre'		=> 'SISTEMA DE GESTION DE INNOVACION',
          'descripcion' => 'Servicio orientado a ideas innovadoras',
          ]);
      \DB::table('servicios')->insert([
          'id_servicio' => 3,
          'nombre'		=> 'EMPRENDIMIENTO',
          'descripcion' => 'Apoyo a emprendedores, orientado a fondos de CORFO',
          ]);
      \DB::table('servicios')->insert([
          'id_servicio' => 4,
          'nombre'		=> 'INCENTIVO TRIBUTARIO A LA I+D',
          'descripcion' => '',
           ]);
      \DB::table('servicios')->insert([
          'id_servicio' => 5,
          'nombre'		=> 'PROPIEDAD INTELECTUAL',
          'descripcion' => '',
           ]);
      \DB::table('servicios')->insert([
          'id_servicio' => 6,
          'nombre'		=> 'FORMACION Y CAPACITACION',
          'descripcion' => '',
           ]);

     
    }
}
