class TeamForm extends Factory
  constructor: (NEXO, Role, formlyConfig) ->
    formlyConfig.setType({
      name: 'teamRolesLimit',
      templateUrl: commonTemplateUrl('fields/teams/roles-limits'),
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
    })


    fields = {
      basic: [
        {
          key: 'status',
          type: 'ui-select-single-id'
          templateOptions: {
            label: 'Activada'
            optionsAttr: 'bs-options',
            ngOptions: 'option.value as option in to.options | filter: $select.search',
            placeholder: 'Seleccione la opción'
            required: true,
            valueProp: 'value'
            labelProp: 'label'
            options: [
              {
                value: 'inactive',
                label: 'No'
              }
              {
                value: 'active',
                label: 'Si'
              }
            ]
          }
          defaultValue: 'active'
        }
        {
          key: 'name'
          type: 'input'
          templateOptions: {
            label: 'Nombre'
            required: true
          }
        }
        {
          key: 'slug'
          type: 'input'
          templateOptions: {
            label: 'URL'
            required: true
            description: '(Ej: empresa). No escriba el dominio'
            addonRight: {
              text: '.nexologistica.com'
            }
          }
        }
        {
          key: 'logo'
          type: 'image'
          templateOptions: {
            label: 'Logo'
          }
        }
      ]

      modules: [
        {
          key: 'modules',
          type: 'multiCheckboxSwitch'
          templateOptions: {
            label: ''
            options: []
            valueProp: 'id'
            labelProp: 'name'
          }
          controller: ['$scope', 'Module', ($scope, Module) ->
            $scope.to.loading = Module.findAll({}, {bypassCache: true}).then((response) ->
              $scope.to.options = response
              return response
            )
          ]
        }
      ]

      rolesLimit: [
        {
          key: 'roles_limits',
          type: 'teamRolesLimit'
          controller: ['$scope', 'Role', ($scope, Role) ->
            roles = Role.filter({
              where: {
                slug: {
                  in: ['team-admin', 'despachador', 'rutero']
                }
              }
            })

            $scope.model[$scope.options.key] = []

            _.forEach(roles, (role) ->
              role.role_id = role.id
              $scope.model[$scope.options.key].push(role)
            )

            unwatchModel = $scope.$watch 'model.limits.data', (nv) ->
              return unless nv
              _.forEach($scope.model[$scope.options.key], (model) ->
                nvModel = _.find(nv, {role_id: model.role_id})
                model.limit = _.get(nvModel, 'limit') or 0
              )
              unwatchModel()
          ]
          templateOptions: {
            label: ''
            fields: [
              {
                key: 'limit'
                type: 'input'
                templateOptions: {
                  label: ''
                  required: true
                }
              }
              {
                className: 'hide'
                key: 'role_id'
                type: 'input'
                templateOptions: {
                  label: ''
                  required: true
                }
              }
            ]

          }
          defaultValue: []
        }
      ]
    }

    return fields