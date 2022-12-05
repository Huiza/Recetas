<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
        	'nombre'=>'Comida mexicana',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categorias')->insert([
        	'nombre'=>'Comida italiana',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('categorias')->insert([
        	'nombre'=>'Comida argentina',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('categorias')->insert([
        	'nombre'=>'Postres',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('categorias')->insert([
        	'nombre'=>'Cortes',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('categorias')->insert([
        	'nombre'=>'Ensaladas',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('categorias')->insert([
        	'nombre'=>'Desayuno',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
