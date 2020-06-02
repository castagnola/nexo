class Routes extends Config
  constructor: ($stateProvider, $urlRouterProvider) ->
    $urlRouterProvider.otherwise(($injector) ->
      $state = $injector.get '$state'
      $state.go 'dashboard'
    )


    $stateProvider

    .state 'root', {
      abstract: true
      templateUrl: templateUrl('main'),
      controller: 'mainController',
      controllerAs: 'mainCtrl',
      resolve: {

        currentTeam: ['Team', 'NEXO', (Team, NEXO) ->
          return Team.find(NEXO.team_id, {
            params: {
              include: 'modules,limits'
            }
          })
        ]
        servicesStatuses: ['ServiceStatus', (ServiceStatus) ->
          return ServiceStatus.findAll({})
        ]
        events: ['NexoEvent', (NexoEvent) ->
          return NexoEvent.findAll()
        ]
        services: ['CustomerPhone', 'CustomerAddress', 'Customer', 'Service', (CustomerPhone, CustomerAddress, Customer, Service) ->
          return Service.findAll({
            limit: 100
          })
        ]
      }
    }


    .state 'main', {
      parent: 'root'
      views: {
        'sidebar@root': {
          templateUrl: templateUrl('sidebar')
        }
      }
    }

    .state 'dashboard', {
      url: '/'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'dashboardController'
          controllerAs: 'vm'
          templateUrl: templateUrl('dashboard')
        }
      }
    }


    .state 'editTeam', {
      url: '/edit'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'teamEditController'
          controllerAs: 'vm'
          templateUrl: templateUrl('edit')
        }
      }
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'services', {
      url: '/services'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'servicesController'
          controllerAs: 'vm'
          templateUrl: templateUrl('services/list')
        }
      }
      resolve: {
        services: ['CustomerPhone', 'CustomerAddress', 'Customer', 'Service', (CustomerPhone, CustomerAddress, Customer, Service) ->
          return Service.findAll({
            limit: 500
          }, {bypassCache: true})
        ]
      }
    }

    .state 'services.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'serviceFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('services/form')
        }
      }

      resolve: {
        can: ['Team', 'NEXO', (Team, NEXO) ->
          return Team.canCreateService(NEXO.team_id)
        ]

        users: ['UserGeolocalization', 'ServiceAssignment', 'User', (UserGeolocalization, ServiceAssignment, User) ->
          return User.findAll({
            role: ['rutero']
            include: 'geolocalizations:limit(1):order(created_at|desc),phones'
          }, {bypassCache: true})
        ]
        currentService: () ->
          return null
        editMode: () ->
          return false
      }

      data: {
        permissions: {
          except: ['rutero']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'services.edit', {
      url: '/:serviceId/edit'
      views: {
        'content@root': {
          controller: 'serviceFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('services/form')
        }
      }
      resolve: {
        currentService: ['Service', '$stateParams', (Service, $stateParams) ->
          params = {
            bypassCache: true
          }
          return Service.find($stateParams.serviceId, params)
        ]
        editMode: () ->
          return true
      }
      data: {
        permissions: {
          except: ['rutero']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'services.reasign', {
      url: '/:serviceId/reasign'
      views: {
        'content@root': {
          controller: 'serviceReasignController'
          controllerAs: 'vm'
          templateUrl: templateUrl('services/reasign')
        }
      }
      resolve: {
        currentService: ['Service', '$stateParams', (Service, $stateParams) ->
          params = {
            bypassCache: true,
            params: {
              include: 'assignments.user,users'
            }
          }
          return Service.find($stateParams.serviceId, params)
        ]
        users: ['UserGeolocalization', 'ServiceAssignment', 'User', (UserGeolocalization, ServiceAssignment, User) ->
          return User.findAll({
            role: ['rutero']
            include: 'geolocalizations:limit(1):order(created_at|desc),phones'
          }, {bypassCache: true})
        ]
      }
      data: {
        permissions: {
          except: ['rutero']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'services.detail', {
      url: '/:serviceId'
      views: {
        'content@root': {
          controller: 'servicesDetailController'
          controllerAs: 'vm'
          templateUrl: templateUrl('services/detail')
        }
      }
      resolve: {
        service: ['Service', '$stateParams', (Service, $stateParams) ->
          params = {
            bypassCache: true
            params: {
              include: 'assignments.user,users'
            }
          }
          Service.find($stateParams.serviceId, params)
        ]
      }
    }


    .state 'users', {
      url: '/users'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'usersListController'
          controllerAs: 'vm'
          templateUrl: templateUrl('users/list')
        }
      }
      resolve: {
        users: ['NexoEvent', 'User', (NexoEvent, User) ->
          User.findAll()
        ]
      }
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }


    .state 'users.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'usersFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('users/form')
        }
      }
      resolve: {
        editMode: ->
          return false
      }
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'users.edit', {
      url: '/:userId/edit'
      views: {
        'content@root': {
          controller: 'usersFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('users/form')
        }
      }
      resolve: {
        editMode: ->
          return true

        currentUser: ['$stateParams', 'User', 'UserTransport', 'Transport', ($stateParams, User, UserTransport, Transport) ->
          User.find($stateParams.userId, {
            bypassCache: true
            params: {
              include: 'contact,transports'
            }
          })
        ]
      }
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }

# Customers

    .state 'customers', {
      url: '/customers'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'customersListController'
          controllerAs: 'vm'
          templateUrl: templateUrl('customers/list')
        }
      }
      resolve: {
        customers: ['CustomerAddress', 'CustomerPhone', 'Customer', (CustomerAddress, CustomerPhone, Customer) ->
          Customer.findAll({}, {bypassCache: true})
        ]
      }
      data: {
        permissions: {
          only: ['admin', 'team-admin', 'despachador']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'customers.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'customersFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('customers/form')
        }
      }
      resolve: {
        editMode: ->
          return false
      },
      data: {
        permissions: {
          only: ['admin', 'team-admin', 'despachador']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'customers.edit', {
      url: '/:customerId/edit'
      views: {
        'content@root': {
          controller: 'customersFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('customers/form')
        }
      }
      resolve: {
        editMode: ->
          return true

        currentCustomer: ['$stateParams', 'Customer', ($stateParams, Customer) ->
          return Customer.find($stateParams.customerId, {
            bypassCache: true
          }).then((response) ->
            return response
          )
        ]
      },
      data: {
        permissions: {
          only: ['admin', 'team-admin', 'despachador']
          redirectTo: 'dashboard'
        }
      }
    }


    .state 'customers.import', {
      url: '/import'
      views: {
        'content@root': {
          controller: 'importCustomersController'
          controllerAs: 'vm'
          templateUrl: templateUrl('customers/import')
        }
      }
    }


# Estadísticas

    .state 'stats', {
      url: '/stats'
      parent: 'main'
      abstract: true
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }

    .state 'stats.services', {
      url: '/services'
      views: {
        'content@root': {
          controller: 'teamStatsServicesController'
          controllerAs: 'vm'
          templateUrl: templateUrl('stats/services')
        }
      }
    }

    .state 'stats.users', {
      url: '/users'
      views: {
        'content@root': {
          controller: 'teamStatsUsersController'
          controllerAs: 'vm'
          templateUrl: templateUrl('stats/users')
        }
      }
    }

    .state 'stats.polls', {
      url: '/polls'
      views: {
        'content@root': {
          controller: 'teamStatsPollsController'
          controllerAs: 'vm'
          templateUrl: templateUrl('stats/polls')
        }
      }
    }

# Configuración

    .state 'config', {
      url: '/config'
      parent: 'main'
      abstract: true
      data: {
        permissions: {
          only: ['admin', 'team-admin']
          redirectTo: 'dashboard'
        }
      }
    }

# Encuestas

    .state 'config.polls', {
      url: '/polls'
      views: {
        'content@root': {
          controller: 'configPollsListController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/polls/list')
        }
      }
      resolve: {
        items: ['Team', 'Poll', (Team, Poll) ->
          Poll.findAll()
        ]
      }
    }

    .state 'config.polls.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'configPollsCreateController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/polls/form')
        }
      }
    }

    .state 'config.polls.edit', {
      url: '/:pollId/edit'
      views: {
        'content@root': {
          controller: 'configPollsEditController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/polls/form')
        }
      }
      resolve: {
        currentPoll: ['Poll', '$stateParams', (Poll, $stateParams) ->
          params = {
            bypassCache: true
            params: {
              include: 'questions.options'
            }
          }
          return Poll.find($stateParams.pollId, params)
        ]
      }
    }

# Categorías de servicios

    .state 'config.servicesTypes', {
      url: '/services-categories'
      views: {
        'content@root': {
          controller: 'configServicesTypesListController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/services-types/list')
        }
      }
      resolve: {
        items: ['ServiceType', (ServiceType) ->
          ServiceType.findAll()
        ]
      }
    }

# Crear categoría de servicio

    .state 'config.servicesTypes.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'configServicesTypesCreateController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/services-types/form')
        }
      }
    }

# Editar categoría de servicio

    .state 'config.servicesTypes.edit', {
      url: '/:serviceTypeId/edit'
      views: {
        'content@root': {
          controller: 'configServicesTypesEditController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/services-types/form')
        }
      }
    }

# Ver items de una categoría de servicio

    .state 'config.servicesTypes.edit.items', {
      url: '/items'
      views: {
        'content@root': {
          controller: 'configServicesTypesEditItemsController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/services-types/items/list')
        }
      }

      resolve: {
        fields: ['ServiceTypeItem', '$stateParams', (ServiceTypeItem, $stateParams) ->
          ServiceTypeItem.findAll({
            service_type_id: $stateParams.serviceTypeId
          })
        ]
      }
    }

# Editar/Crear categoría de servicio

    .state 'config.servicesTypes.edit.form', {
      url: '/form'
      views: {
        'content@root': {
          controller: 'configServicesTypesEditFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/services-types/edit-form')
        }
      }

      resolve: {
        fields: ['ServiceTypeField', '$stateParams', (ServiceTypeField, $stateParams) ->
          ServiceTypeField.findAll({
            service_type_id: $stateParams.serviceTypeId
          })
        ]
      }
    }


# Editar preferencias
    .state 'config.preferences', {
      url: '/preferences',
      views: {
        'content@root': {
          controller: 'configPreferencesController'
          controllerAs: 'vm'
          templateUrl: templateUrl('config/preferences')
        }
      }
    }

