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

class CustomerPhone extends Model implements Transformable
{
    use TransformableTrait, Eloquence, Mutable, SoftDeletes;

    protected $table = 'customers_phones';

    protected $fillable = [
        'type',
        'phone',
        'customer_id'
    ];

    protected $getterMutators = [
        'customer_id' => 'hashid'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function _save($post){
        $keyName = $this->primaryKey;

        if(array_key_exists($keyName, $post)){
            if($post[$keyName] > 0){
                $item = $this->find($post[$keyName]);
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
