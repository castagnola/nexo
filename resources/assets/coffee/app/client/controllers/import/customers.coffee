class ImportCustomers extends Controller
  constructor: ($scope, $state, Upload, Customer) ->
    onSubmit = (isValid) ->
      if isValid
        vm.importing = true
        vm.ready = false

        Upload.upload({
          url: '/api/customers/init-import',
          data: {
            file: vm.model.file
          }
        }).then((response) ->
          vm.data = _.get(response, 'data')

          if vm.data.ready is true
            vm.ready = true

        , (resp) ->
          console.log 'Error upload', resp

          vm.importing = false
        )


    onFinishSuccess = (response) ->
      $state.go 'customers', {}, {reload: true}
      onCancel()
      toastr.success "Se han importado #{response.data.saved} clientes correctamente"

    onFinishError = () ->
      vm.ready = true

    onFinishFinally = ->
      vm.finishing = false


    onFinish = ->
      vm.ready = false
      vm.importing = true
      vm.finishing = true

      itemsToSave = _.where(vm.data.items, {ready: true})

      Customer.finishImport({items: itemsToSave}).then(onFinishSuccess, onFinishError).finally(onFinishFinally)


    onCancel = ->
      vm.importing = false
      vm.finishing = false
      vm.ready = false
      vm.model = {}
      vm.data = null

    vm = this
    vm.model = {}
    vm.data = null
    vm.importing = false

    vm.onSubmit = onSubmit
    vm.onCancel = onCancel
    vm.onFinish = onFinish