class MapsConfig extends Config
  constructor: (uiGmapGoogleMapApiProvider) ->
    uiGmapGoogleMapApiProvider.configure({
      v: '3.20',
      libraries: 'weather,geometry,visualization'
    })