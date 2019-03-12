<?php

use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\Models\Documento::class,10)->create();

        $categorias = \App\Models\Categoria::all();
        factory(\App\Models\Documento::class,20)->create()->each(function($documento) use($categorias){
            $categoriasRandom = $categorias->random(4);
            $documento->categorias()->sync($categoriasRandom->pluck('id')->all());
        });
    }
}
