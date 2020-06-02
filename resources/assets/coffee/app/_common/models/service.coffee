class Service extends Factory
  constructor: (DS, SERVICE_SCHEMA, DATES_FORMATS) ->
    processServiceData = (unprocessData) ->
      schema = _.keys(SERVICE_SCHEMA)
      data = _.pick(unprocessData, schema)


      ### Procesando fechas ###
      if _.has data, 'start_at'
        if moment.isMoment(data.start_at)
          data.start_at = data.start_at.format(DATES_FORMATS.DATETIME)
        else
          data.start_at = moment(data.start_at).format(DATES_FORMATS.DATETIME)

      if _.has data, 'end_at'
        if moment.isMoment(data.end_at)
          data.end_at = data.end_at.format(DATES_FORMATS.DATETIME)
        else
          data.end_at = moment(data.end_at).format(DATES_FORMATS.DATETIME)

      ### Procesando duración ###
      if !_.has(data, 'duration') and _.has data, 'start_at' and _.has data, 'end_at'
        data.duration = moment(data.end_at).diff(moment(data.start_at), 'minutes')


      ### Procesando usuarios ###
      unless _.isEmpty(data.users)
        if _.has(_.first(data.users), 'id')
          data.users = _.pluck(data.users, 'id')

      ### Procesando asignaciones ###
      unless _.isEmpty(data.assignments)
        if _.has(_.first(data.assignments), 'id')
          data.assignments = _.pluck(data.assignments, 'id')


      return data

    model = DS.defineResource({
      name: 'service',
      endpoint: 'services'

      relations: {
        belongsTo: {
          team: {
            localField: 'team',
            localKey: 'team_id'
          }
          customer: {
            localField: 'customer',
            localKey: 'customer_id'
          }
        }
      }

      beforeUpdate: (Service, service, cb) ->
        data = processServiceData(service)
        return cb(null, data)

      beforeCreate: (Service, service, cb) ->
        data = processServiceData(service)
        err = validate(data, SERVICE_SCHEMA)
        if !_.isUndefined(err)
          cb(err)
        else
          cb(null, data)
    })

    return model
