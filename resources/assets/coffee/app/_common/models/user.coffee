class User extends Factory
  constructor: (DS, DSHttpAdapter, DATES_FORMATS) ->
    model = DS.defineResource({
      name: 'user',
      endpoint: 'users'

      computed: {
        firstName: ['name', (name) ->
          return _.first(_.words(name))
        ]
      }

      relations: {
        hasMany: {
          serviceAssignment: {
            localField: 'assignments',
            foreignKey: 'user_id'
          }

          event: {
            localField: 'events',
            foreignKey: 'user_id'
          }

          userTransport: {
            localField: 'transports',
            foreignKey: 'user_id'
          }

          userGeolocalization: {
            localField: 'geolocalizations',
            foreignKey: 'user_id'
          }
        }
      }

      methods: {
        getDistanceOfLocalization: () ->
          return model.getDistanceOfLocalization(this.id)
      }
    })


    model.getDistanceOfLocalization = (userId) ->
      return _.random(1, 10000)


    model.getLocations = () ->
      url = DS.utils.makePath(DSHttpAdapter.defaults.basePath, model.endpoint, 'locations')
      return DSHttpAdapter.GET(url)


    model.getBusy = (ids, start, end, excludeServicesIds) ->
      url = DS.utils.makePath(DSHttpAdapter.defaults.basePath, model.endpoint, 'busy')


      data = {
        ids: ids
        start: moment(start).format(DATES_FORMATS.DATETIME),
        end: moment(end).format(DATES_FORMATS.DATETIME)
      }

      unless _.isEmpty(excludeServicesIds)
        data.exclude_services_ids = excludeServicesIds

      return DSHttpAdapter.POST(url, data)


    model.getChannel = ->
      url = DS.utils.makePath(DSHttpAdapter.defaults.basePath, model.endpoint, 'channel')
      return DSHttpAdapter.GET(url)

    return model