<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

/**
 * Class PollAnswer
 * @package Nexo\Entities
 */
class PollAnswer extends NexoModel implements Transformable
{
    use TransformableTrait, Eloquence, Mappable, Mutable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'polls_answers';

    /**
     * @var array
     */
    protected $fillable = [
        'poll_id',
        'customer_id',
        'service_id',
        'ranking',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(\Nexo\Entities\PollAnswerOption::class, 'poll_answer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(\Nexo\Entities\Customer::class, 'customer_id')->withTrashed();
    }

    public function poll()
    {
        return $this->belongsTo(\Nexo\Entities\Poll::class, 'poll_id');
    }
}
