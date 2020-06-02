class PermissionsRun extends Run
  constructor: (Permission, NEXO) ->
    manyRoles = ['admin', 'team-admin', 'despachador', 'rutero']

    Permission.defineManyRoles manyRoles, (stateParams, roleName) ->
      check = _.some(NEXO.roles, (role) ->
        return role is roleName
      )
      return check

