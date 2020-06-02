class NexoMap extends Controller
  constructor: ($log, $rootScope, $scope, $http, $element, uiGmapGoogleMapApi, NexoMap, TEMPLATE_URL, DATES_FORMATS, User, NexoSocket) ->
    setMapCenter = (coordinates) ->
      vm.map.center = coordinates
      vm.showMap = true


    addCSSRule = (sheet, selector, rules, index) ->
      if 'insertRule' of sheet
        sheet.insertRule selector + '{' + rules + '}', index
      else if 'addRule' of sheet
        sheet.addRule selector, rules, index
      return

    getLocations = () ->
      vm.showEmptyDataMessage = false

      User.getLocations().then((response) ->
        data = _.get(response, 'data') or response
        url = "#{NEXO.base_url}assets/images/markers/fondo.png"

        if _.isEmpty(data)
          vm.showEmptyDataMessage = true

        _.forEach(data, (item, index) ->
          marker =
            id: item.user_id
            latitude: item.latitude
            longitude: item.longitude
            name: item.user_name
            date: item.created_at
            icon:
              url: "#{url}##{index}"
            refreshUser: vm.refreshUser

          vm.usersMarkers.push marker

          addCSSRule document.styleSheets[0], 'img[src="' + url + '#' + index + '"]', 'background:url(' + item.user_avatar + ') no-repeat 4px 4px', index

          if _.isEmpty(vm.map.center)
            vm.map.center = {
              latitude: item.latitude,
              longitude: item.longitude
            }

          vm.showMap = !_.isEmpty(vm.usersMarkers)
        )
      )


    vm = this

    vm.map = {
      center: {}
      control: {}
      zoom: 13
    }
    vm.loadingMap = true
    vm.showEmptyDataMessage = false
    vm.usersMarkers = []
    vm.windowTemplateUrl = commonTemplateUrl('map/info-window')


    uiGmapGoogleMapApi.then(() ->
      vm.loadingMap = false
      getLocations()
    )

    NexoSocket.forward 'localization-created', $scope

    $scope.$on 'socket:localization-created', (ev, data) ->
      $log.debug 'WS: Localization created', data

      marker = _.find(vm.usersMarkers, {id: data.user_id})

      if !_.isEmpty(marker)
        marker.latitude = data.latitude
        marker.longitude = data.longitude
      else
        getLocations()






