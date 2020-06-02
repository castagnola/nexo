class CustomerForm extends Factory
  constructor: ($rootScope, formlyConfig, NEXO) ->
    fields = {
      basic: [
        {
          key: 'first_name',
          type: 'input',
          templateOptions: {
            label: 'Nombres',
            required: true,
          }
        }
        {
          key: 'last_name',
          type: 'input',
          templateOptions: {
            label: 'Apellidos',
            required: true,
          }
        }
        {
          key: 'email',
          type: 'email',
          templateOptions: {
            label: 'Email',
            required: true,
          }
        }
        {
          key: 'document_type',
          type: 'select',
          templateOptions: {
            label: 'Tipo de documento',
            required: true,
            options: NEXO.documentTypes
            valueProp: 'slug'
          }
        }
        {
          key: 'document',
          type: 'input',
          templateOptions: {
            label: 'Documento',
            required: true,
          }
        }
      ]

      addresses: [
        {
          key: 'addresses',
          type: 'repeatSection',
          templateOptions: {
            btnText: 'Agregar otra dirección'
            label: 'Dirección'
            required: true
            fields: [
              {
                key: 'city',
                type: 'cities',
                templateOptions: {
                  label: 'Ciudad'
                  required: true
                }
              }
              {
                key: 'street',
                type: 'textarea',
                templateOptions: {
                  label: 'Dirección',
                  required: true,
                }
              }
            ]
          }
        }
      ]

      phones: [
        {
          key: 'phones',
          type: 'repeatSection',
          templateOptions: {
            btnText: 'Agregar otro teléfono'
            label: 'Teléfono'
            required: true
            fields: [
              {
                className: 'row',
                fieldGroup: [
                  {
                    className: "col-xs-4"
                    key: 'type',
                    type: 'select',
                    templateOptions: {
                      label: 'Tipo'
                      required: true,
                      options: [
                        {
                          name: 'Fijo'
                          value: 'telefono-fijo',
                          icon: 'fa fa-phone'
                        }
                        {
                          name: 'Móvil'
                          value: 'telefono-movil',
                          icon: 'fa fa-mobile'
                        }
                      ]
                    }
                  }
                  {
                    className: "col-xs-8"
                    key: 'phone',
                    type: 'input',
                    templateOptions: {
                      label: 'Teléfono',
                      required: true
                    }
                  }
                ]
              }
            ]
          }
        }
      ]
    }

    return fields