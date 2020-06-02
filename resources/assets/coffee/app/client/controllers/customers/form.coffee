class CustomersForm extends Controller
  constructor: ($scope, $rootScope, $state, $stateParams, Customer, CustomerForm, editMode) ->
    onSubmitSuccess = (response) ->
      toastr.success if editMode then 'Cliente editado correctamente' else 'Cliente creado correctamente'
      $state.go 'customers'

    onSubmitFinally = ->
      vm.submitting = false

    onSubmit = ->
      if vm.form.$valid
        vm.submitting = true

        if editMode
          Customer.update($stateParams.customerId, vm.model).then(onSubmitSuccess).finally(onSubmitFinally)
        else
          Customer.create(vm.model).then(onSubmitSuccess).finally(onSubmitFinally)

    vm = this
    vm.fields = CustomerForm
    vm.model = {}
    vm.onSubmit = onSubmit

    if editMode

      customer = Customer.get($stateParams.customerId)
      model = _.clone(customer)

      _.set(model, 'addresses', [])

      _.forEach(customer.addresses, (address) ->
        model.addresses.push address
      )

      _.set(model, 'phones', [])

      _.forEach(customer.phones, (phone) ->
        model.phones.push phone
      )


      vm.model = model