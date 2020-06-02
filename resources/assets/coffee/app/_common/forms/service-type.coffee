class ServiceTypeForm extends Factory
  constructor: (formlyConfig, NEXO) ->
    fields = [
      {
        key: 'name'
        type: 'input'
        templateOptions: {
          label: 'Nombre'
          required: true
        }
      }
      {
        key: 'description'
        type: 'textarea'
        templateOptions: {
          label: 'Descripción'
        }
      }
      {
        key: 'avg_response_time'
        type: 'duration'
        templateOptions: {
          label: 'Tiempo estimado de respuesta'
          required: true
        }
      }
    ]

    return fields