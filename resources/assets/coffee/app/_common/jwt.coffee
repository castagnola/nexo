class JwtConfig extends Config
  constructor: ($httpProvider, jwtInterceptorProvider, $localStorageProvider, NEXO) ->
    $localStorageProvider.set('token', NEXO.token)

    jwtInterceptorProvider.tokenGetter = ['jwtHelper', '$http', '$location', (jwtHelper, $http, $location) ->
      idToken = $localStorageProvider.get('token')

      if jwtHelper.isTokenExpired(idToken)

        url = "/auth/delegation"

        return $http(
          url: url
          skipAuthorization: true
          method: 'POST'
          headers:
            Authorization: "Bearer #{idToken}"
        ).then (response) ->
          token = response.data.token
          $localStorageProvider.set('token', token)
          return token
        , (error) ->
          $location.href = "/auth/login?from=session-expired"

      else
        return idToken

    ]
    $httpProvider.interceptors.push 'jwtInterceptor'