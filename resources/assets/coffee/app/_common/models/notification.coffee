class Notification extends Factory
  constructor: (DS) ->
    return DS.defineResource({
      name: 'notification',
      endpoint: 'notifications'
    })