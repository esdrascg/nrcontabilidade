<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Documento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'id_categoria',
        'id_cliente',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'nome',
        'descricao',
    ];

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }


}
