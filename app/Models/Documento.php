<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Documento extends Model implements TableInterface
{
    use FormAccessible;

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

    public function getTableHeaders()
    {
        return ['#','Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->nome;
        }
    }

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

    public function formCategoriasAtribute(){
        return $this->categorias->pluck('id')->all();
    }


}
