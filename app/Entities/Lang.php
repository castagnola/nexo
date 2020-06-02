<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mutable;

/**
 * Class Lang
 * @package Nexo\Entities
 */
class Lang extends Model implements Transformable
{
    use TransformableTrait, Eloquence, Mutable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'content',
    ];

    /**
     * @var array
     */
    protected $getterMutators = [
        'content' => 'base64_decode|json_decode:true'
    ];

    /**
     * @var array
     */
    protected $setterMutators = [
        'content' => 'json_encode|base64_encode'
    ];


    /**
     * @return array
     */
    public function getBase()
    {
        $langBase = [
            'GLOBAL' => json_decode(\File::get(base_path('angular/app/locale.json')), true),
            'FORMS' => json_decode(\File::get(base_path('angular/app/forms/locale.json')), true),
            'PAGES' => [],
            'MENU' => json_decode(\File::get(base_path('angular/app/components/nxSidenav/locale.json')), true)
        ];
        

        // Generate pages
        $pagesFiles = glob_recursive(base_path('angular/app/pages/**/*.json'));

        foreach ($pagesFiles as $pageFile) {
            $dirname = strtoupper(last(explode('/',dirname($pageFile))));

            $file = \File::get($pageFile);

            if (!empty($file)) {
                $fileDecoded = json_decode($file, true);
                if (!empty($fileDecoded)) {
                    $langBase['PAGES'][$dirname] = $fileDecoded;
                }
            }
        }

        return $langBase;
    }

    /**
     * @return $this
     */
    public function checkWithBase()
    {
        $langBase = $this->getBase();

        echo json_encode($langBase, JSON_UNESCAPED_UNICODE);
        exit;

        if (!empty($this->content)) {
            $this->content = array_replace_recursive($langBase, $this->content);
        } else {
            $this->content = $langBase;
        }

        $this->save();

        return $this;
    }
}
