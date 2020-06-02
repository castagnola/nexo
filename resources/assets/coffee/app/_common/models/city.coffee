class City extends Factory
  constructor: (DS) ->
    return DS.defineResource({
      name: 'city',
      endpoint: 'cities'
    })