<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PollOption extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'polls_options';

    protected $fillable = [
        'poll_question_id',
        'option',
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

    public function pollsAnswersOptions()
    {
        return $this->hasMany(\Nexo\Entities\PollAnswerOption::class, 'poll_option_id');
    }

    public function question()
    {
        return $this->belongsTo(\Nexo\Entities\PollQuestion::class, 'poll_question_id');
    }
}
