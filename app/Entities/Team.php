<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nexo\Entities\User;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Team
 * @package Nexo\Entities
 */
class Team extends NexoModel implements Transformable, Presentable
{
    use TransformableTrait, SoftDeletes, RevisionableTrait, PresentableTrait, Eloquence;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
        'logo',
        'work_time_start',
        'work_time_end',
        'work_time_minutes',
        'lang'
    ];

    /**
     * @var array
     */
    protected $revisionFormattedFields = array(
        'logo' => 'string:%s',
        'work_time_minutes' => 'string:%s minutos',
    );

    /**
     * @var array
     */
    protected $revisionFormattedFieldNames = array(
        'logo' => 'Logo',
        'work_time_start' => 'Calendario inicia',
        'work_time_end' => 'Calendario finaliza',
        'work_time_minutes' => 'Duración en el calendario',
    );


    protected $searchableColumns = ['name', 'slug'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_team');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicesTypes()
    {
        return $this->hasMany(ServiceType::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolesLimits()
    {
        return $this->hasMany(TeamRoleLimit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function limits()
    {
        return $this->hasMany(TeamRoleLimit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsCategories()
    {
        return $this->hasMany(ProductCategory::class, 'team_id');
    }

    /**
     * @param string $filter
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function logoUrl($filter = 'original')
    {
        $exists = !empty($this->logo) && file_exists(storage_path('app/' . $this->logo));

        if ($exists) {
            return route("imagecache", [$filter, $this->logo]);
        }

        return url('nexo-logo-small.png');
    }

    /**
     * @param $roleId
     * @return bool
     */
    public function roleLimit($roleId)
    {
        $roleLimit = $this->rolesLimits->where('role_id', $roleId)->first();

        if (empty($roleLimit)) {
            return false;
        }

        $roleLimit->remaining = $roleLimit->limit - $this->users()->whereHas('roles', function ($query) use ($roleId) {
                return $query->where('id', $roleId);
            })->count();


        return $roleLimit;
    }

    /**
     * @param $roleSlug
     * @return mixed
     */
    public function usersByRoleSlug($roleSlug)
    {
        return $this->users()->whereHas('roles', function ($query) use ($roleSlug) {
            return $query->where('slug', $roleSlug);
        });
    }

    /**
     * @return bool
     */
    public function canCreateUsersByRoleId($roleId)
    {
        $limit = $this->rolesLimits->where('role_id', $roleId)->sum('limit');

        if (empty($limit)) {
            return true;
        }

        return $this->users()->whereHas('roles', function ($query) use ($roleId) {
            return $query->where('id', $roleId);
        })->count() < $limit;
    }

    /**
     * @return bool
     */
    public function canCreateUsers()
    {
        $limit = $this->rolesLimits->sum('limit');

        if (empty($limit)) {
            return true;
        }

        return $this->users->count() < $limit;
    }

    public function canCreateUsersByRole($roleId)
    {
        $limit = $this->rolesLimits->where('role_id', $roleId)->sum('limit');

        if (empty($limit)) {
            return true;
        }

        return $this->users()->whereHas('roles', function($query) use ($roleId){
            return $query->where('id', $roleId);
        })->count() < $limit;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function haveUser(User $user)
    {
        return !$this->users->where('id', $user->id)->isEmpty();
    }
    
}
