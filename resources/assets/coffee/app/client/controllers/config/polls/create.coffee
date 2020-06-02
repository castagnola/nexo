class ConfigPollsCreate extends Controller
  constructor: ($scope, $stateParams, $state, Poll, PollForm) ->
    onSubmitFinally = ->
      vm.submitting = false

    onSubmitSuccess = (response) ->
      toastr.success "La encuesta #{response.name} ha sido creada correctamente"
      $state.go 'config.polls'

    onSubmit = ->
      if vm.form.$valid
        data = angular.copy vm.model
        Poll.create(data).then(onSubmitSuccess).finally(onSubmitFinally)
      else
        bootbox.alert 'Complete toda la información necesaria.'

    vm = this
    vm.fields = PollForm
    vm.model = {}
    vm.editMode = false
    vm.onSubmit = onSubmit
