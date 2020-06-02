class JsDataRun extends Run
  constructor: ($rootScope, DS, DSHttpAdapter) ->
    $rootScope.$pagination = []

    deserializeRelations = (resource, data) ->
      if _.isArray data
        data = _.map data, (item) ->
          return deserializeRelations resource, item
      else
        unless _.isEmpty(resource.relations)
          _.forEach(resource.relations, (relationsDefinitions, relationType) ->
            _.forEach(relationsDefinitions, (relations, relationName) ->
              _.forEach(relations, (relation) ->
                relationData = _.get(data, "#{relation.localField}.data") or _.get(data, "#{relation.localField}")


                unless _.isUndefined(relationData)
                  relationResource = _.get(DS.definitions, relationName)

                  unless _.isEmpty(relationResource)
                    relationData = deserializeRelations(relationResource, relationData)

                  data[relation.localField] = relationData
              )
            )
          )
        return data

    DS.defaults.deserialize = (resource, response) ->
      data = if _.has(response.data, 'data') then response.data.data else response.data


      if _.has(response.data, 'meta')
        if _.has(response.data.meta, 'pagination')
          paginationKey = if _.has(response.config.params, 'path') then response.config.params.path else resource.endpoint
          $rootScope.$pagination[paginationKey] = response.data.meta.pagination

      return deserializeRelations(resource, data)


    DSHttpAdapter.defaults.queryTransform = (resourceConfig, params) ->
      orderBy = _.get(params, 'orderBy')

      if _.isArray(orderBy)

        if _.isArray _.first(orderBy)
          params.orderBy = _.first(orderBy)[0]
          params.sortedBy = _.first(orderBy)[1]
        else
          params.orderBy = orderBy[0]
          params.sortedBy = orderBy[1]

      return params

