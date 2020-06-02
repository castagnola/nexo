class MapCalendarButtons extends Controller
  constructor: ($scope, $aside) ->
    openMap = ->
      asideInstance = $aside.open({
        templateUrl: templateUrl('map/aside'),
        controller: 'mapAsideController',
        placement: 'bottom',
        windowClass: 'nexo-aside'
      })


    openCalendar = ->
      asideInstance = $aside.open({
        templateUrl: templateUrl('calendar/aside'),
        controller: 'calendarAsideController',
        placement: 'bottom',
        windowClass: 'nexo-aside'
      })


    vm = this
    vm.openMap = openMap
    vm.openCalendar = openCalendar