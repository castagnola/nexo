<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nexo\EntitiesPresenters\CustomerPresenter;
use Nexo\Entities\User;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

/**
 * Class Customer
 * @package Nexo\Entities
 */
class Customer extends NexoModel implements Transformable
{
    use TransformableTrait, SoftDeletes, Eloquence, Mappable, Mutable;

    protected $table = 'customers';

    /**
     * @var
     */
    protected $presenter = CustomerPresenter::class;

    protected $searchableColumns = ['first_name', 'last_name', 'document', 'document_type', 'email'];

    protected $setterMutators = [
        'first_name' => 'trim|strtolower|ucwords',
        'last_name' => 'trim|strtolower|ucwords',
        'email' => 'trim',
    ];


    protected $getterMutators = [
        'first_name' => 'trim|strtolower|ucwords',
        'last_name' => 'trim|strtolower|ucwords',
        'email' => 'trim',
    ];
    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'document',
        'document_type',
        'email',
        'team_id',
    ];

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }


    /**
     * @return string
     */
    public function getNameDocumentAttribute()
    {
        return sprintf('%s %s <%s>', $this->first_name, $this->last_name, $this->document);
    }

    /**
     * @return string
     */
    public function getDocumentFormattedAttribute()
    {
        return sprintf('%s - %s', $this->document_type, $this->document);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function team()
    {
        return $this->belongsTo(\Nexo\Entities\Team::class, 'team_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(\Nexo\Entities\Service::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(\Nexo\Entities\CustomerAddress::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(\Nexo\Entities\CustomerPhone::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pollsAnswers()
    {
        return $this->hasMany(PollAnswer::class, 'customer_id');
    }
}
