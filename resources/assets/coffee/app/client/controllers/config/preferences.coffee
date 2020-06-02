class ConfigPreferences extends Controller
  constructor: ($scope, Team, NEXO, DATES_FORMATS) ->
    fields = [
      {
        key: 'work_time_start',
        type: 'clockpicker'
        templateOptions: {
          label: 'Inicio de jornada laboral'
          placeholder: 'Seleccione una hora'
          required: true,
        }

      }
      {
        key: 'work_time_end',
        type: 'clockpicker'
        templateOptions: {
          label: 'Fin de jornada laboral'
          placeholder: 'Seleccione una hora'
          required: true,
        }
        validators: {
          startRequired: {
            expression: ($viewValue, $modelValue, scope) ->
              startValue = _.get(scope.model, 'work_time_start')
              return !_.isEmpty(startValue)
            message: '"Debe indicar primero la hora de inicio"'
          }
          majorThan: {
            expression: ($viewValue, $modelValue, scope) ->
              value = $viewValue or $modelValue
              startValue = _.get(scope.model, 'work_time_start')
              startHour = moment(startValue, DATES_FORMATS.HOUR_CLIENT)
              endHour = moment(value, DATES_FORMATS.HOUR_CLIENT)

              check = endHour > startHour


              return check
            message: '"Selecciona una hora mayor a la de inicio"'
          }
        }
      }
    ]

    onSubmitFinally = () ->
      vm.submitting = false

    onSubmitSuccess = ()  ->
      toastr.success "Las preferencias de la empresa se editaron correctamente."

    onSubmit = () ->
      if vm.form.$valid
        vm.submitting = true
        model = angular.copy(vm.model)
        data = {
          work_time_start : moment(model.work_time_start, DATES_FORMATS.HOUR_CLIENT).format(DATES_FORMATS.HOUR_SERVER)
          work_time_end : moment(model.work_time_end, DATES_FORMATS.HOUR_CLIENT).format(DATES_FORMATS.HOUR_SERVER)
        }


        Team.update(NEXO.team_id, data).then(onSubmitSuccess).finally(onSubmitFinally)

      else
        bootbox.alert('Complete toda la información necesaria.')


    vm = this
    vm.fields = fields
    vm.model = Team.get(NEXO.team_id)
    vm.onSubmit = onSubmit

