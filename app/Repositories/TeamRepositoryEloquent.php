<?php

namespace Nexo\Repositories;

use Nexo\Entities\TeamRoleLimit;
use Nexo\Validators\TeamValidator;
use Nexo\Entities\Team;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TeamRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class TeamRepositoryEloquent extends BaseRepository implements TeamRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'slug' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Team::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function validator()
    {
        return TeamValidator::class;
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        if (!isset($attributes['status'])) {
            $attributes['status'] = 'active';
        }


        // Logo
        if (isset($attributes['logo'])) {
            $attributes['logo'] = $this->uploadLogo($attributes['logo'], $attributes['name']);
        }


        $model = parent::create($attributes);


        // Ahora sincronizando los módulos
        $modules = isset($attributes['modules']) ? $attributes['modules'] : [];
        $model->modules()->sync($modules);

        // Los limites de usuario por empresa
        if (isset($attributes['limits'])) {
            $this->processRolesLimits($model, $attributes['limits']);
        }

        return $model;
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $newLogo = isset($attributes['logo']) ? $attributes['logo'] : false;

        $model = parent::find($id);

        if (!empty($newLogo) && ($model->logoUrl('medium') !== $newLogo)) {
            $attributes['logo'] = $this->uploadLogo($attributes['logo'], $id);
        } else {
            unset($attributes['logo']);
        }

        if (!empty($model)) {

            // Ahora sincronizando los módulos
            $modules = isset($attributes['modules']) ? $attributes['modules'] : [];
            $model->modules()->sync($modules);

            // Los limites de usuario por empresa
            if (isset($attributes['limits'])) {
                $this->processRolesLimits($model, $attributes['limits']);
            }

            return parent::update($attributes, $id);

        }

        return false;
    }

    /**
     * @param $logo
     * @param $id
     * @return null|string
     */
    private function uploadLogo($logo, $identifier)
    {
        $fileName = null;

        if (!empty($logo)) {
            $fileName = sprintf('teams/logo-%s.png', md5($identifier) . str_random(4));

            \Storage::makeDirectory('teams');
            $path = storage_path('app/' . $fileName);
            \Image::make($logo)->save($path);
        }

        return $fileName;
    }

    /**
     * @param $model
     * @param $rolesLimits
     */
    private function processRolesLimits($model, $limits)
    {
        $repository = app(TeamRoleLimitRepository::class);

        foreach ($limits as $limit) {
            if (isset($limit['id'])) {
                $repository->update([
                    'limit' => $limit['limit']
                ], $limit['id']);
            } else {
                $limit['team_id'] = $model->id;
                $repository->create($limit);
            }
        }
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        $model = $this->model->where('slug', $slug)->firstOrFail();
        return $this->parserResult($model);
    }
}