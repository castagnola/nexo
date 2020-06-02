class ServiceTypeFieldForm extends Factory
  constructor: (formlyConfig, NEXO) ->
    fields = [
      {
        key: 'type'
        type: 'ui-select'
        templateOptions: {
          label: 'Tipo'
          optionsAttr: 'bs-options',
          ngOptions: 'option.id as option in to.options | filter: $select.search',
          valueProp: 'id',
          labelProp: 'name',
          placeholder: 'Seleccione un tipo...',
          options: [
            {
              id: 'input',
              name: 'Campo de texto'
            }
            {
              id: 'textarea',
              name: 'Área de texto'
            }
          ]
          required: true
        }
      }
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
        key: 'is_required'
        type: 'ui-select'
        templateOptions: {
          label: '¿Es obligatorio?'
          optionsAttr: 'bs-options',
          ngOptions: 'option.value as option in to.options | filter: $select.search',
          valueProp: 'value',
          labelProp: 'name',
          options: [
            {
              value: 0,
              name: 'No'
            }
            {
              value: 1,
              name: 'Si'
            }
          ]
          defaultValue: 0
          required: true
        }
      }
    ]

    return fields