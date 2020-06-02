class ServiceStatus extends Factory
  constructor: (DS) ->
    return DS.defineResource({
      name: 'serviceStatus',
      endpoint: 'services-statuses'
    })