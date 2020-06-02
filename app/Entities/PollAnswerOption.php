<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PollAnswerOption extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'polls_answers_options';

    protected $fillable = [
        'poll_question_id',
        'poll_answer_id',
        'poll_option_id',
        'answer',
    ];

    public function option()
    {
        return $this->belongsTo(\Nexo\Entities\PollOption::class, 'poll_option_id');
    }

    public function question()
    {
        return $this->belongsTo(\Nexo\Entities\PollQuestion::class, 'poll_question_id');
    }
}
