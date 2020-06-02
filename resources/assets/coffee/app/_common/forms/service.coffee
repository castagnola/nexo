class ServiceForm extends Factory
  constructor: ($rootScope, formlyConfig, NEXO, IS) ->
    fields = {
      extra: []
      basic: [
        {
          key: 'service_type',
          type: 'ui-select-single',
          templateOptions: {
            optionsAttr: 'bs-options',
            ngOptions: 'option in to.options | filter: $select.search',
            label: 'Categoría del servicio',
            valueProp: 'id',
            labelProp: 'name',
            placeholder: 'Seleccione una categoría...',
            options: []
            required: true
          }
          controller: ['$scope', 'ServiceTypeField', 'ServiceTypeItem', 'ServiceType', ($scope, ServiceTypeField, ServiceTypeItem, ServiceType) ->
            params =
              include: 'items,fields'
            $scope.to.loading = ServiceType.findAll(params, {bypassCache: true}).then((response) ->
              $scope.to.options = response
              return response
            )
          ]

          watcher: {
            listener: (a, nv) ->
              typeFields = _.get(nv, 'fields') or false

              fields.extra = []

              unless _.isEmpty(typeFields)

                _.forEach(typeFields, (typeField) ->
                  fields.extra.push {

                    key: "extra[#{typeField.id}]"
                    type: typeField.type
                    templateOptions: {
                      label: typeField.name
                      description: typeField.description or null
                      required: typeField.is_required
                    }
                  }
                )
          }
        }

        {
          template: '<div class="mb text-muted">Duración del servicio: <strong>{{model.service_type.response_time | amDurationFormat : "minute"}}</strong></div>'
          hideExpression: '!model.service_type.items'
        }

        {
          key: 'items'
          type: 'multiCheckbox'
          templateOptions: {
            label: 'Items del servicio'
            valueProp: 'id',
            labelProp: 'name'
            options: []
          }
          controller: ['$scope', 'ServiceTypeItem', ($scope, ServiceTypeItem) ->
            $scope.$watch('model.service_type', (nv) ->
              items = _.get(nv, 'items')
              $scope.to.options = items
            )

            $scope.$watch("model.#{$scope.options.key}", (nv) ->
              $scope.model[$scope.options.key + '_data'] = ServiceTypeItem.filter({
                where: {
                  id: {
                    'in': nv or []
                  }
                }
              })
            )
          ]
          hideExpression: '!model.service_type.items.length'
        }
        {
          key: 'observations'
          type: 'textarea'
          templateOptions: {
            label: 'Observaciones'
          }
        }
      ]
      date: [
        {
          key: 'start_at',
          type: 'service-date'
          templateOptions: {
            label: ''
            required: true
          }
        }
      ]
      assignment_type: [
        {
          key: 'assignment_type',
          type: 'service-assignment-type'
          templateOptions: {
            label: ''
          }
        }
      ]
      users: [
        {
          key: 'users',
          type: 'service-assignments-form'
          templateOptions: {
            label: ''
          }
          hideExpression: '!model.start_at || !model.assignment_type'
        }
      ]
      contact: [
        {
          key: 'customer_address_id',
          type: 'service-address'
          templateOptions: {
            label: ''
          }
        }
      ]
    }


    return fields