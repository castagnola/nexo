class NexoSocket extends Factory
  constructor: ($q, $log, $rootScope, socketFactory, User) ->
    onConnect = ->
      deferred = $q.defer()
      User.getChannel().then((response) ->
        $log.debug 'WS: Getter', response

        myIoSocket = io.connect(response.data.url)

        socket = socketFactory({
          ioSocket: myIoSocket
        })

        _.forEach(response.data.channels, (channel) ->
          socket.emit('join', channel)
        )

        deferred.resolve(socket)
      )

      return deferred.promise

    forward = (eventName, scope) ->
      factory.connect().then((socket) ->
        socket.forward(eventName, scope)
      )

    factory =
      socket: null
      connect: onConnect
      forward: forward


    return factory