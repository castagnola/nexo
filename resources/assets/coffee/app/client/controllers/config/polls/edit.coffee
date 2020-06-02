class ConfigPollsEdit extends Controller
  constructor: ($scope, $stateParams, $state, Poll, PollForm) ->
    onSubmitFinally = ->
      vm.submitting = false

    onSubmitSuccess = (response) ->
      toastr.success "La encuesta #{response.name} ha sido editada correctamente"
      $state.go 'config.polls'

    onSubmit = ->
      if vm.form.$valid
        data = angular.copy vm.model
        $scope.poll.DSUpdate(data).then(onSubmitSuccess).finally(onSubmitFinally)
      else
        bootbox.alert 'Complete toda la información necesaria.'

    vm = this
    vm.fields = PollForm
    vm.model = {}
    vm.editMode = true
    vm.onSubmit = onSubmit


    Poll.bindOne($stateParams.pollId, $scope, 'poll', (cb, data) ->
      model = angular.copy(data)
      model.questions = _.map(model.questions.data, (question) ->
        question.options = question.options.data
        return question
      )
      vm.model = model
    )