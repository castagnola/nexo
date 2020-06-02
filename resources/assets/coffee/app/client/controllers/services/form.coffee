class ServiceForm extends Controller
  constructor: ($log, $rootScope, $scope, $state, $stateParams, $timeout, $aside, ServiceType, Service, ServiceForm, User, CustomerPhone, CustomerAddress, Customer, CustomerForm, WizardHandler, editMode) ->



    ### Instancia de los campos para el formulario ###
    fields = ServiceForm
    fields.newCustomer = CustomerForm


    validationMessages =
      1: 'Por favor seleccione o cree al cliente'
      2: 'Por favor complete la información necesaria'
      3: 'Por favor seleccione una dirección'
      4: 'Por favor seleccione la programación y el tipo de servicio'

    ###*
     * Verificar validación
    ###
    verifyValidity = (currentStep) ->
      try
        check = switch currentStep
          when 1 then !!vm.model.customer_id
          when 2 then vm.forms.basic.$valid and vm.forms.extra.$valid
          when 3 then vm.forms.contact.$valid
          when 4 then !!vm.model.assignment_type and !!vm.model.date_type
        return check

    ###*
     * Continuar en el wizard
    ###
    next = ->
      currentStep = WizardHandler.wizard().currentStepNumber()

      unless verifyValidity(currentStep)
        bootbox.alert(validationMessages[currentStep])
        return false

      # Mostramos el mapa y el schedule solo si es el paso correspondiente
      vm.showScheduleAndMap = currentStep is 2
      # Si el paso es después del 2 mostramos el botón cancelar
      vm.showCancelButton = currentStep > 0

      WizardHandler.wizard().next()

    ###*
     * Regresar en el wizard
    ###
    prev = ->
      WizardHandler.wizard().previous()
      currentStep = WizardHandler.wizard().currentStepNumber()
      vm.showCancelButton = currentStep > 2

    ###*
     * Buscar clientes existentes
    ###
    onSearchCustomers = (keywords) ->
      vm.searchingCustomers = true
      vm.searchedCustomers = false

      Customer.findAll({
        search: keywords
      }).then((response) ->
        vm.searchingCustomers = false
        vm.searchedCustomers = true
        vm.customers = response
      , () ->
        vm.searchingCustomers = false
        vm.searchedCustomers = true
      )

    ###*
     * Seleccionar a un cliente de la lista y continuar
    ###
    onSelectCustomer = (customer) ->
      vm.model.customer = customer
      vm.model.customer_id = customer.id
      next()

    ###*
     * Cuando el continuar con nuevo cliente responde correctamente
    ###
    onNextWithNewCustomerSuccess = (response) ->
      vm.model.customer = response
      vm.model.customer_id = response.id
      vm.showNewCustomerForm = false
      next()

    ###*
     * Cuando el continuar con nuevo cliente finaliza
    ###
    onNextWithNewCustomerFinally = ->
      vm.creatingCustomer = false

    ###*
      * Continuar con un nuevo cliente
    ###
    onNextWithNewCustomer = () ->
      vm.creatingCustomer = true
      Customer.create(vm.customer).then(onNextWithNewCustomerSuccess).finally(onNextWithNewCustomerFinally)


    onSubmitSuccess = (serviceResponse) ->
      if vm.editMode
        $state.go 'services'
        toastr.success "El servicio #{serviceResponse.code} ha sido actualizado correctamente."
      else
        vm.saved = true
        vm.newService = serviceResponse

    onSubmitFinally = ->
      vm.submitting = false

    onSubmit = ->
      $log.debug 'Creando el servicio', vm.form

      vm.submitting = true

      Service.create(vm.model).then(onSubmitSuccess, (errorResponse) ->
        $log.error 'Error creando el servicio', errorResponse
      ).finally(onSubmitFinally)
      return


    onCreateAnotherServiceClick = ->
      location.reload()


    ### Instancia de vm ###
    vm = this
    vm.created = false
    vm.showCancelButton = false
    vm.showScheduleAndMap = false
    vm.showSchedule = true
    vm.showContactForm = false
    vm.fields = fields
    vm.next = next
    vm.prev = prev
    vm.verifyValidity = verifyValidity
    vm.model = {}
    vm.onSearchCustomers = onSearchCustomers
    vm.onSelectCustomer = onSelectCustomer
    vm.onNextWithNewCustomer = onNextWithNewCustomer
    vm.minDate = new Date()
    vm.onSubmit = onSubmit
    vm.onCreateAnotherServiceClick = onCreateAnotherServiceClick
    vm.editMode = editMode



    $scope.$on 'wizard:stepChanged', (ev, step) ->
      $log.debug 'Step changed', step
      vm.showContactForm = step.index is 2
      vm.showSubmitButton = step.index is 4


    # ----- MODO EDICION -----
    if editMode
      Service.bindOne($stateParams.serviceId, $scope, 'service', (cb, data) ->
        model = angular.copy(data)

        vm.model = model
        vm.model.items = _.pluck(model.items.data, 'id')
        vm.model.start_at = model.start_at.date
        vm.model.end_at = model.end_at.date

        vm.customers = [
          model.customer
        ]

        ServiceType.bindOne(model.type.id, $scope, 'serviceTypeOfService', (cb, data) ->
          vm.model.service_type = data
        )

        try
          delete vm.model.assignments
          delete vm.model.users
          delete vm.model.map
      )


















