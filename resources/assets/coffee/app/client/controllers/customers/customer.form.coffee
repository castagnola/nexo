class CustomerForm extends Controller
  constructor: ($scope, NEXO, Customer) ->
    vm = this

    vm.customer = NEXO.customer


    vm.formBasicInformationFields = [
      {
        key: 'first_name',
        type: 'input',
        templateOptions: {
          label: 'Nombres',
          required: true,
        }
      }
      {
        key: 'last_name',
        type: 'input',
        templateOptions: {
          label: 'Apellidos',
          required: true,
        }
      }
      {
        key: 'email',
        type: 'input',
        templateOptions: {
          label: 'Email',
          required: true,
        }
      }
      {
        key: 'document_type',
        type: 'select',
        templateOptions: {
          label: 'Tipo de documento',
          required: true,
          options: NEXO.documentTypes
          valueProp: 'slug'
        }
      }
      {
        key: 'document',
        type: 'input',
        templateOptions: {
          label: 'Documento',
          required: true,
        }
      }
    ]

    vm.formAddressesFields = [
      {
        key: 'city_id',
        type: 'cities',
        templateOptions: {
          label: 'Ciudad'
          required: true
        }
      }
      {
        key: 'street',
        type: 'textarea',
        templateOptions: {
          label: 'Dirección',
          required: true,
        }
      }
    ]

    vm.formPhonesFields = [
      {
        fieldGroup: [
          {
            className: "col-xs-4"
            key: 'type',
            type: 'select',
            templateOptions: {
              label: 'Tipo'
              required: true,
              options: [
                {
                  name: 'Fijo'
                  value: 'telefono-fijo',
                  icon: 'fa fa-phone'
                }
                {
                  name: 'Móvil'
                  value: 'telefono-movil',
                  icon: 'fa fa-mobile'
                }
              ]
            }
          }
          {
            className: "col-xs-8"
            key: 'phone',
            type: 'input',
            templateOptions: {
              label: 'Teléfono',
              required: true
            }
          }
        ]
      }

    ]

    vm.addStreet = ->
      vm.customer.addresses.push {
        city_id: null
        street: null
      }

    vm.removeStreet = ($index) ->
      _.pullAt(vm.customer.addresses, $index)

    vm.addPhone = ->
      vm.customer.phones.push {
        type: null,
        phone: null
      }

    vm.removePhone = ($index) ->
      _.pullAt(vm.customer.phones, $index)

    vm.onSubmit = () ->
      vm.submitting = true
      Customer.update(vm.customer.id, vm.customer).then(() ->
        toastr.success('El cliente se ha actualizado correctamente', 'Cliente actualizado')
      , (errorResponse) ->
        message = _.get(errorResponse, 'data.message') or 'Hubo un error actualizando al cliente'
        toastr.error(message)
      ).finally(() ->
        vm.submitting = false
      )


    vm.onDestroy = ->
      message = "¿Desea eliminar al cliente?"

      if NEXO.customer_services_count > 0
        message = "Este cliente cuenta con #{NEXO.customer_services_count} servicios. #{message}"


      bootbox.confirm(message, (result) ->
        if result
          $scope.$apply(() ->
            vm.deleting = true
          )
          $('#form-destroy').get(0).submit()
      )

      return

