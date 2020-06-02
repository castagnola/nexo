class Customer extends Factory
  constructor: (DS, DSHttpAdapter) ->
    model = DS.defineResource({
      name: 'customer',
      endpoint: 'customers'

      relations: {
        hasMany: {
          services: {
            localField: 'services',
            foreignKey: 'customer_id'
          }

          customerAddress: {
            localField: 'addresses',
            foreignKey: 'customer_id'
          }
        }
      }
    })


    model.finishImport = (data) ->
      url = DS.utils.makePath(DSHttpAdapter.defaults.basePath, model.endpoint, 'finish-import')

      return DSHttpAdapter.POST(url, data)

    return model