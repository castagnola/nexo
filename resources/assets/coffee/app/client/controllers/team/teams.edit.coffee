class TeamEdit extends Controller
  constructor: ($rootScope, $scope, $state, Upload, Cropper, $timeout, TeamForm, Team, NEXO) ->
    onSubmit = ->
      if vm.form.$valid

        vm.submitting = true

        # Desde el field procesamos la imagen cortada
        $rootScope.$processImageField().then(() ->
          $scope.team.DSUpdate(vm.model).then(() ->
            toastr.success 'Empresa editada correctamente'
            $state.go 'dashboard'
          ).finally(() ->
            vm.submitting = false
          )
        )

    vm = this
    vm.fields = TeamForm
    vm.options = {}
    vm.model = {}
    vm.onSubmit = onSubmit


    Team.bindOne NEXO.team_id, $scope, 'team', (cb, data) ->
      vm.model = _.clone data
      vm.model.modules = _.map vm.model.modules.data, (module) ->
        return module.id






