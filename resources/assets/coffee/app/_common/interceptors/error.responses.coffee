class HTTPRequestInterceptor extends Factory
  constructor: ($interpolate, $q, $location) ->
    return {
      'responseError': (rejection) ->
        message = _.get rejection, 'data.message', 'Hubo un error ejecutando la acción'

        status = rejection.status

        if status is 422
          message = _.get rejection, 'data.message' or 'La siguiente información es necesaria para la creación'
          errors = _.get rejection, 'data.errors' or []

          bootbox.alert("#{message}: <br><br>  #{_.flatten(_.values(errors)).join(', ')}")
        else
          bootbox.alert(message or 'Hubo un error ejecutando la acción')

        return $q.reject(rejection)
    }