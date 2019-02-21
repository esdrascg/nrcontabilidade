<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Categoria::class,20)->create();


//        $documentos = \App\Models\Documento::all();
//        factory(\App\Models\Categoria::class,20)->create()->each(function($categoria) use($documentos){
//            $documentosrandom = $documentos->random(4);
//            $categoria->documentos()->sync($documentosrandom->pluck('id')->all());
//        });

        //factory(\App\Models\Categoria::class,20)->create();

    }
}
