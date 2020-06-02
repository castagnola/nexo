<?php

namespace Nexo\Providers;

use Prettus\Validator\Exceptions\ValidatorException;
use Validator;
use Illuminate\Support\ServiceProvider;
use Hashids;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/../helpers.php';

        Validator::extend('time_duration', function ($attribute, $value, $parameters) {
            $timeDuration = strtotime($value);

            if (empty($timeDuration)) {
                return false;
            }

            $timeDurationCalculate = $timeDuration - strtotime('today');

            if (empty($timeDurationCalculate)) {
                return false;
            }

            return true;
        });

        // Own mutators
        $this->app['eloquence.mutator']->macro('hashid', function ($value) {
            return Hashids::encode($value);
        });
        $this->app['eloquence.mutator']->macro('implode_by_comma', function ($value) {
            return implode(',', $value);
        });
        $this->app['eloquence.mutator']->macro('explode_by_comma', function ($value) {
            return explode(',', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'config/nexo-permissions.php'
        ]);

        if ($this->app->environment() == 'local') {
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }


        $this->app->bind('Nexo\Contracts\PushNotification', 'Nexo\Services\PushNotification');


        $this->app->make('Dingo\Api\Exception\Handler')->register(function (ValidatorException $exception) {
            return \Response::make(['message' => 'Error en la acción. Revise que la información esté completa y sea la adecuada', 'errors' => $exception->getMessageBag()], 422);
        });

        $this->app->bind('League\Fractal\Manager', function ($app) {
            $fractal = new \League\Fractal\Manager;

            $serializer = new \League\Fractal\Serializer\ArraySerializer();

            $fractal->setSerializer($serializer);

            return $fractal;
        });
    }
}
