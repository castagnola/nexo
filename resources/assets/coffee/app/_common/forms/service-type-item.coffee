class ServiceTypeItemForm extends Factory
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

    ]

    return fields