class NexoDistance extends Filter
  constructor: ($filter) ->
    conversionKey = {
      m: {
        km: 0.001,
        m: 1
      },
      km: {
        km: 1,
        m: 1000
      }
    }

    filter = (distance) ->
      convertedDistance = $filter('number')(distance * conversionKey.m.km, 2)
      return "#{convertedDistance} km"

    return filter