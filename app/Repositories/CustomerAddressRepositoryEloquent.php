<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\CustomerAddress;

/**
 * Class CustomerStreetRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class CustomerAddressRepositoryEloquent extends BaseRepository implements CustomerAddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerAddress::class;
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
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        //$this->updateMap($model,$attributes, $id);
        return $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        //$this->updateMap($model,$attributes, $id);
        return $model;
    }

    /*public function updateMap($model,$attributes = array(),$id = 0,$force = true){
        $path = storage_path('app/');
        if(array_key_exists('map', $attributes)){
            $filename = $attributes['map'];
            if(!empty($filename){
                if(File::exists($path.$filename)){
                    File::delete($path.$filename);
                }
            }
        }
        if ($force) {
            $map = "https://maps.googleapis.com/maps/api/staticmap?center={$this->latitude},{$this->longitude}&size=800x800&zoom=16&markers=color:red|{$this->latitude},{$this->longitude}";

            $mapFilename = sprintf('maps/%s-%s.jpg', md5($map), str_random(8));
            \Storage::makeDirectory('maps');
            $path = storage_path('app/' . $mapFilename);
            \Image::make($map)->save($path);

            $model->id  = $id;
            $model->map = $mapFilename;
            $model->save();
        }

        return $model;
    }*/
}