class NexoSchedule extends Directive
  constructor: ($log, $timeout) ->
    link = (scope, element, attrs) ->
      $scheduler = null

      moveToToday = ->
        $log.debug 'Intentando navegar en scroll horizontal en el scheduler'

        $timeout ->
          $element = angular.element ".k-current-time"
          if _.isObject $element
            $content = $scheduler.element.find('div.k-scheduler-content')
            position = $element.position()
            left = _.get(position, 'left') or 0
            $content.scrollLeft((left + $content.scrollLeft()) - 80)

      moveToEvent = (event) ->
        $log.debug 'Scroll hasta el evento nuevo', event


        $element = angular.element "[data-uid='#{event.uid}']"
        $content = $scheduler.element.find('div.k-scheduler-content')

        try
          $content.animate({
            scrollLeft: ($element.position().left + $content.scrollLeft()) - 80
          })


      scope.$on 'kendoWidgetCreated', (ev, scheduler) ->
        $scheduler = scheduler
        moveToToday()
        $scheduler.bind("navigate", moveToToday)


      scope.moveToEvent = moveToEvent


    directive =
      templateUrl: commonTemplateUrl('schedule')
      controller: 'scheduleController'
      link: link

    return directive