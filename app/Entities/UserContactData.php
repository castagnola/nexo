<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserContactData extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_contact_data';

    protected $fillable = [
        'user_id',
        'value',
        'type'
    ];

    protected $presenter = \Nexo\EntitiesPresenters\UserContactDataPresenter::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Nexo\Entities\User::class, 'user_id');
    }

}
