<?php

namespace Nexo\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Nexo\Repositories\TeamRepository', 'Nexo\Repositories\TeamRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\TeamRoleLimitRepository', 'Nexo\Repositories\TeamRoleLimitRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserRepository', 'Nexo\Repositories\UserRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserDeviceRepository', 'Nexo\Repositories\UserDeviceRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserGeolocalizationRepository', 'Nexo\Repositories\UserGeolocalizationRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserAssignmentRepository', 'Nexo\Repositories\UserAssignmentRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserTransportRepository', 'Nexo\Repositories\UserTransportRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\UserContactDataRepository', 'Nexo\Repositories\UserContactDataRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\RoleRepository', 'Nexo\Repositories\RoleRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceRepository', 'Nexo\Repositories\ServiceRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceExtraRepository', 'Nexo\Repositories\ServiceExtraRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceTypeRepository', 'Nexo\Repositories\ServiceTypeRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceTypeFieldRepository', 'Nexo\Repositories\ServiceTypeFieldRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceItemRepository', 'Nexo\Repositories\ServiceItemRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceAssignmentRepository', 'Nexo\Repositories\ServiceAssignmentRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceStatusRepository', 'Nexo\Repositories\ServiceStatusRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceNoveltyRepository', 'Nexo\Repositories\ServiceNoveltyRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceTimelineRepository', 'Nexo\Repositories\ServiceTimelineRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ServiceLocationRepository', 'Nexo\Repositories\ServiceLocationRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\CustomerRepository', 'Nexo\Repositories\CustomerRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\CustomerAddressRepository', 'Nexo\Repositories\CustomerAddressRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\ModuleRepository', 'Nexo\Repositories\ModuleRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\PollRepository', 'Nexo\Repositories\PollRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\PollQuestionRepository', 'Nexo\Repositories\PollQuestionRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\PollOptionRepository', 'Nexo\Repositories\PollOptionRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\PollAnswerRepository', 'Nexo\Repositories\PollAnswerRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\PollAnswerOptionRepository', 'Nexo\Repositories\PollAnswerOptionRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\LocationCityRepository', 'Nexo\Repositories\LocationCityRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\NotificationRepository', 'Nexo\Repositories\NotificationRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\TransportRepository', 'Nexo\Repositories\TransportRepositoryEloquent');
        $this->app->bind('Nexo\Repositories\RouteRepository', 'Nexo\Repositories\RouteRepositoryEloquent');
    }
}
