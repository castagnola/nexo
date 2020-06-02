<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PollQuestion extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'polls_questions';

    protected $fillable = [
        'poll_id',
        'question',
        'type',
        'order'
    ];

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


    public function options()
    {
        return $this->hasMany(PollOption::class, 'poll_question_id');
    }

}
