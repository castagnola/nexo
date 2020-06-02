class Routes extends Config
  constructor: ($urlRouterProvider, $stateProvider) ->
    $urlRouterProvider.otherwise(($injector) ->
      $state = $injector.get '$state'
      $state.go 'teams'
    )

    $stateProvider

    .state 'root', {
      abstract: true
      templateUrl: templateUrl('main'),
      controller: 'mainController',
      controllerAs: 'mainCtrl'

      resolve: {
        roles: ['Role', (Role) ->
          return Role.findAll()
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

    .state 'teams', {
      url: '/teams'
      parent: 'main'
      views: {
        'content@root': {
          controller: 'teamsListController'
          controllerAs: 'vm'
          templateUrl: templateUrl('teams.list')
        }
      }
      resolve: {
        teams: ['Team', (Team) ->
          return Team.findAll({}, {bypassCache: true})
        ]
      }
    }



    .state 'teams.create', {
      url: '/create'
      views: {
        'content@root': {
          controller: 'teamsFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('teams/form')
        }
      }
      resolve: {
        editMode: ->
          return false
      }
    }

    .state 'teams.edit', {
      url: '/:teamId/edit'
      views: {
        'content@root': {
          controller: 'teamsFormController'
          controllerAs: 'vm'
          templateUrl: templateUrl('teams/form')
        }
      }
      resolve: {
        editMode: ->
          return true

        currentTeam: ['$stateParams', 'Team', ($stateParams, Team) ->
          return Team.find($stateParams.teamId, {
            bypassCache: true
            params: {
              include: 'modules,limits'
            }
          })
        ]
      }
    }

    .state 'teams.show', {
      url: '/:teamId'
      views: {
        'content@root': {
          controller: 'teamsShowController'
          controllerAs: 'vm'
          templateUrl: templateUrl('teams/show')
        }
      }
      resolve: {
        currentTeam: ['$stateParams', 'Team', ($stateParams, Team) ->
          return Team.find($stateParams.teamId, {
            bypassCache: true
            params: {
              include: 'modules,limits,users'
            }
          })
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
    }

