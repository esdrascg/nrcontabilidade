<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByUserCriteria.
 *
 * @package namespace App\Criteria;
 */
class FindByUserCriteria implements CriteriaInterface
{
    /**
     * FindByUserCriteria constructor.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('name', 'LIKE', "%{$this->name}%");
    }
}
