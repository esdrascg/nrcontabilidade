<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Categoria.
 *
 * @package namespace App\Models;
 */
class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nome'];

    public function documentos(){
        return $this->belongsToMany(Documento::class);
    }

}
