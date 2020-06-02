<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ToolRepository;
use Nexo\Entities\Tool;
use Nexo\Validators\ToolValidator;

/**
 * Class ToolRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ToolRepositoryEloquent extends BaseRepository implements ToolRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tool::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ToolValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        
        $model = parent::create($attributes);
        

        if(array_key_exists('services', $attributes)){
            $model->services()->sync($attributes['services']);    
        }

        if(array_key_exists('products', $attributes)){
            $model->products()->sync($attributes['products']);    
        }

        return $model;
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {        
        $model = parent::update($attributes, $id);

        if(array_key_exists('services', $attributes)){
            $model->services()->sync($attributes['services']);    
        }

        if(array_key_exists('products', $attributes)){
            $model->products()->sync($attributes['products']);    
        }
        
        return $model;
    }

    
}
