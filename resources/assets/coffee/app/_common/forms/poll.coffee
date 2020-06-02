class PollForm extends Factory
  constructor: () ->
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
        key: 'questions',
        type: 'repeatSection',
        templateOptions: {
          btnText: 'Agregar otra pregunta'
          label: 'Pregunta'
          required: true
          fields: [
            {
              key: 'question'
              type: 'textarea'
              templateOptions: {
                label: 'Contenido de la pregunta'
                required: true
              }
            }
            {
              key: 'type'
              type: 'select',
              templateOptions: {
                label: 'Tipo de pregunta',
                required: true,
                options: [
                  {
                    label: 'Abierta',
                    value: 'open'
                  }
                  {
                    label: 'Selección múltiple',
                    value: 'multiple'
                  }
                ]
                labelProp: 'label'
                valueProp: 'value'
              }
            }
            {
              key: 'options',
              type: 'repeatSection',
              templateOptions: {
                btnText: 'Agregar otra opción'
                label: 'Opción'
                required: true
                fields: [
                  {
                    key: 'option'
                    type: 'input'
                    templateOptions: {
                      label: 'Contenido de la opción'
                      required: true
                    }
                  }

                ]
              }
              hideExpression: "model.type != 'multiple'"
            }
          ]
        }
      }
    ]

    return fields