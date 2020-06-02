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
              $scope.to.options = response

              # Observamos el modelo apra determinar si es rutero o no
              ruteroId = _.get(_.find(response, {slug: 'rutero'}), 'id') or false
              $scope.$watch("model.#{$scope.options.key}", (nv) ->
                $scope.model.is_rutero = ruteroId is nv
              )

              return response
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

      transport: [
        {
          key: 'transports',
          type: 'repeatSection',
          hideExpression: '!model.is_rutero'
          templateOptions: {
            btnText: 'Agregar otro transporte'
            label: 'Medio de transporte'
            fields: [
              {
                key: 'transport_id',
                type: 'ui-select-single-id'
                templateOptions: {
                  label: 'Tipo de transporte'
                  optionsAttr: 'bs-options',
                  ngOptions: 'option.id as option in to.options | filter: $select.search',
                  placeholder: 'Seleccione el tipo de transporte'
                  required: true,
                  valueProp: 'id'
                  labelProp: 'name'
                  options: []
                }
                controller: ['$scope', 'Transport', ($scope, Transport) ->
                  $scope.to.loading = Transport.findAll({}, {bypassCache: true}).then((response) ->
                    $scope.to.options = response
                    return response
                  )
                ]
              }
              {
                key: 'is_own',
                type: 'ui-select-single-id'
                templateOptions: {
                  label: '¿Es propio?'
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
                defaultValue: 0
              }
              {
                key: 'name',
                type: 'input',
                templateOptions: {
                  label: 'Nombre',
                }
              }
              {
                key: 'max_capacity',
                type: 'input',
                templateOptions: {
                  label: 'Capacidad máxima',
                  placeholder: 'Ej: 2 Toneladas'
                }
              }
              {
                key: 'max_passangers',
                type: 'input',
                templateOptions: {
                  label: 'Capacidad de pasajeros',
                }
              }
              {
                key: 'max_speed',
                type: 'input',
                templateOptions: {
                  label: 'Velocidad máxima',
                }
              }
              {
                key: 'license_plate',
                type: 'input',
                templateOptions: {
                  label: 'Matrícula (Placa)',
                }
              }
              {
                key: 'city',
                type: 'input',
                templateOptions: {
                  label: 'Ciudad de la mátricula',
                }
              }
              {
                key: 'observations',
                type: 'textarea',
                templateOptions: {
                  label: 'Observaciones',
                }
              }
            ]
          }
        }
      ]
    }

    return fields