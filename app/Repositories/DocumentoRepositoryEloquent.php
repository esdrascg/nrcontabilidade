<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Documento;

/**
 * Class DocumentoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentoRepositoryEloquent extends BaseRepository implements DocumentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Documento::class;
    }

    public function create(array $attributes)
    {
        $model =  parent::create($attributes);
        $model->categorias()->sync($attributes['categoria']);
        return $model;
    }

    public function update(array $attributes, $id)
    {
        $model =  parent::update($attributes, $id);
        $model->categorias()->sync($attributes['categoria']);
        return $model;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
