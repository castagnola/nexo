class TeamsForm extends Controller
  constructor: ($scope, $rootScope, $state, $stateParams, Team, TeamForm, editMode) ->
    service = Team
    itemId = _.get($stateParams, 'teamId') or null

    onSubmitSuccess = (response) ->
      toastr.success if editMode then 'Empresa editada correctamente' else 'Empresa creada correctamente'
      $state.go 'teams'

    onSubmitFinally = ->
      vm.submitting = false

    onSubmit = ->
      if vm.form.$valid
        vm.submitting = true

        $rootScope.$processImageField().then(() ->
          if editMode
            service.update(itemId, vm.model).then(onSubmitSuccess).finally(onSubmitFinally)
          else
            service.create(vm.model).then(onSubmitSuccess).finally(onSubmitFinally)
        )

    vm = this
    vm.editMode = editMode
    vm.fields = TeamForm
    vm.model = {}
    vm.onSubmit = onSubmit

    if editMode
      team = service.get(itemId)
      model = _.clone(team)
      modules = _.get(team, 'modules.data') or _.get(team, 'modules')

      _.set(model, 'modules', [])

      model.modules = _.map(modules, (module) ->
        return module.id
      )

      vm.model = model