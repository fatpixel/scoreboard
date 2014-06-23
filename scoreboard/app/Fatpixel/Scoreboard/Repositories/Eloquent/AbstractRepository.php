<?php

namespace Fatpixel\Scoreboard\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class AbstractRepository
{
    /**
     * The model to execute queries on.
     *
     * @var Eloquent
     */
    protected $model;

    /**
     * Create a new repository instance.
     *
     * @param Eloquent $model The model to execute queries on
     */
    public function __construct(Eloquent $model)
    {
        $this->model = $model;
    }

    /**
     * Get a new instance of the model.
     *
     * @param array $attributes
     * @return Eloquent
     */
    public function buildNew(array $attributes = array())
    {
        return $this->model->newInstance($attributes);
    }
}
