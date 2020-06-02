<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mutable;
use DB;
use File;

/**
 * Class CustomerAddress
 * @package Nexo\Entities
 */
class CustomerAddress extends NexoModel implements Transformable
{
    use TransformableTrait, Eloquence, Mutable, SoftDeletes;

    protected $primaryKey = 'id';


    /**
     * @var string
     */
    protected $table = 'customers_addresses';

    /**
     * @var array
     */
    protected $fillable = [
        'address',
        'customer_id',
        'street',
        'street_number',
        'city_id',
        'is_primary',
        'latitude',
        'longitude',
        'map',
        'is_autocompleted',
        'city',
        'country',
        'country_Code',
        'district',
        'state',
        'place_id',
        'vicinity',
        'observations'
    ];

    protected $getterMutators = [
        'customer_id_hashed' => 'hashid'
    ];

    protected $casts = [
      'is_autocompleted' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cityRelation()
    {
        return $this->belongsTo(LocationCity::class);
    }


    public function _save($post){
        $keyName = $this->primaryKey;

        if(array_key_exists($keyName, $post)){
            if($post[$keyName] > 0){
                $item = $this->withTrashed()->where('id', '=', $post[$keyName])->first();
            }else{
                $item = new self;
            }
        }else{
            $item = new self;
        }

        if(!empty($post)){
            $columns = $this->getAllColumnsNames($this->getTable());
            foreach ($post as $k => $v) {
                if(!is_array($v)){
                    if(in_array($k,$columns) and $v != ''){
                        $item->$k = $v;
                    }
                }
            }
        }

        $item->save();
        return $item->$keyName;
    }

    public function setDeletedAtAttribute($value){
        if($value == 'true') {
            $this->attributes['deleted_at'] = null;
        } else {
            $this->attributes['deleted_at'] = $value;
        }
    }



    public function setLatitudeAttribute($value){
        if(array_key_exists('latitude', $this->attributes)){
            $this->attributes['latitude']  = $value;
        }
        $this->_setMap();
    }

    public function setLongitudeAttribute($value){
        if(array_key_exists('longitude', $this->attributes)){
            $this->attributes['longitude']  = $value;
        }

        $this->_setMap();
    }

    public function setMapAttribute($value){
        $this->_setMap();
    }


    public function _setMap(){

        $value = '';
        $latitude = '';
        $longitude = '';

        if(array_key_exists('map', $this->attributes)){
            $value = $this->attributes['map'];
        }


        $path = storage_path('app/');


        if($value){
            if(File::exists($path.$value)){
                //File::delete($path.$value);
            }
        }


        if(array_key_exists('latitude', $this->attributes)){
            $latitude = $this->attributes['latitude'];
        }

        if(array_key_exists('longitude', $this->attributes)){
            $longitude = $this->attributes['longitude'];
        }


        if($latitude and $longitude){

            $map = "https://maps.googleapis.com/maps/api/staticmap?center={$latitude},{$longitude}&size=800x800&zoom=16&markers=color:red|{$latitude},{$longitude}&key=AIzaSyC2vBv3u8HF4pQbJ5kRMnh-GVPu22V_PE0";

            $mapFilename = sprintf('maps/%s-%s.jpg', md5($map), str_random(8));
            \Storage::makeDirectory('maps');
            $file = $path. $mapFilename;
            \Image::make($map)->save($file);

            $this->attributes['map'] = $mapFilename;
        }


    }


    public function  getAllColumnsNames($table){
        $prefix = DB::connection()->getConfig('prefix');
        switch (DB::connection()->getConfig('driver')) {
            case 'pgsql':
            $query = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$prefix.$table."'";
            $column_name = 'column_name';
            $reverse = true;
            break;

            case 'mysql':
            $query = 'SHOW COLUMNS FROM '.$prefix.$table;
            $column_name = 'Field';
            $reverse = false;
            break;

            case 'sqlsrv':
            $parts = explode('.', $prefix.$table);
            $num = (count($parts) - 1);
            $table = $parts[$num];
            $query = "SELECT column_name FROM ".DB::connection()->getConfig('database').".INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."'";
            $column_name = 'column_name';
            $reverse = false;
            break;

            default:
            $error = 'Database driver not supported: '.DB::connection()->getConfig('driver');
            throw new Exception($error);
            break;
        }

        $columns = array();

        foreach(DB::select($query) as $column)
        {
            $columns[] = $column->$column_name;
        }

        if($reverse)
        {
            $columns = array_reverse($columns);
        }
        return $columns;
    }
}
