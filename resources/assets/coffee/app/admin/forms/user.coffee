class UserForm extends Factory
  constructor: (IS) ->
    confirmPasswordValidator = {
      expression: ($viewValue, $modelValue, scope) ->
        value = $viewValue or $modelValue
        return true if _.isEmpty(scope.model.password)
        return IS.equal(value, scope.model.password)
      message: '"Las contraseñas no coinciden"'
    }


    fields = {
      basic: [
        {
          key: 'active',
          type: 'ui-select-single-id'
          templateOptions: {
            label: 'Activado'
            optionsAttr: 'bs-options',
            ngOptions: 'option.value as option in to.options | filter: $select.search',
            placeholder: 'Seleccione la opción'
            required: true,
            valueProp: 'value'
            labelProp: 'label'
            options: [
              {
                value: 0,
                label: 'No'
              }
              {
                value: 1,
                label: 'Si'
              }
            ]
          }
          defaultValue: 1
        }
        {
          key: 'first_name'
          type: 'input'
          templateOptions: {
            label: 'Nombres'
            required: true
          }
        }
        {
          key: 'last_name'
          type: 'input'
          templateOptions: {
            label: 'Apellidos'
            required: true
          }
        }
        {
          key: 'email'
          type: 'email'
          templateOptions: {
            label: 'Email'
            required: true
          }
        }
        {
          key: 'password'
          type: 'password'
          templateOptions: {
            label: 'Contraseña'
            required: true
          }
          expressionProperties: {
            'templateOptions.required': '!model.id'
          }
          hideExpression: '!!model.id'
        }
        {
          key: 'password_confirm'
          type: 'password'
          templateOptions: {
            label: 'Confirme contraseña'
            required: true
          }
          validators: {
            confirm: confirmPasswordValidator
          }
          expressionProperties: {
            'templateOptions.required': '!model.id'
          }
          hideExpression: '!!model.id'
        }
        {
          key: 'role_id'
          type: 'ui-select-single-id'
          templateOptions: {
            label: 'Grupo'
            options: []
            valueProp: 'id'
            labelProp: 'name'
            optionsAttr: 'bs-options',
            ngOptions: 'option[to.valueProp] as option in to.options | filter: $select.search',
            placeholder: 'Seleccione un grupo'
            required: true
          }
          controller: ['$scope', 'Role', ($scope, Role) ->
            $scope.to.loading = Role.findAll({}, {bypassCache: true}).then((response) ->
              roles = Role.filter({
                where: {
                  slug: {
                    in: ['admin', 'nexo-user']
                  }
                }
              })

              $scope.to.options = roles

              # Observamos el modelo apra determinar si es rutero o no
              ruteroId = _.get(_.find(roles, {slug: 'rutero'}), 'id') or false
              $scope.$watch("model.#{$scope.options.key}", (nv) ->
                $scope.model.is_rutero = ruteroId is nv
              )

              return roles
            )
          ]
        }
        {
          key: 'avatar'
          type: 'image'
          templateOptions: {
            label: 'Imagen de perfil'
          }
        }
      ]

      password: [
        {
          key: 'password'
          type: 'password'
          templateOptions: {
            label: 'Contraseña'
          }
        }
        {
          key: 'password_confirm'
          type: 'password'
          templateOptions: {
            label: 'Confirme contraseña'
          }
          validators: {
            confirm: confirmPasswordValidator
          }
        }
      ]

      contact: [
        {
          key: 'contact',
          type: 'repeatSection',
          templateOptions: {
            btnText: 'Agregar otro dato de contacto'
            label: 'Dato de contacto'
            required: true
            fields: [
              {
                key: 'type',
                type: 'ui-select-single-id'
                templateOptions: {
                  label: ''
                  optionsAttr: 'bs-options',
                  ngOptions: 'option.value as option in to.options | filter: $select.search',
                  placeholder: 'Seleccione el tipo'
                  required: true,
                  valueProp: 'value'
                  labelProp: 'name'
                  options: [
                    {
                      name: 'Dirección'
                      value: 'direccion',
                      icon: 'fa fa-building'
                    }
                    {
                      name: 'Teléfono Fijo'
                      value: 'telefono-fijo',
                      icon: 'fa fa-phone'
                    }
                    {
                      name: 'Teléfono móvil'
                      value: 'telefono-movil',
                      icon: 'fa fa-mobile'
                    }
                  ]
                }
              }
              {
                key: 'value',
                type: 'input',
                templateOptions: {
                  label: '',
                  required: true
                }
              }
            ]
          }
        }
      ]
    }

    return fields
