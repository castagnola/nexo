class NexoUsersListItem extends Directive
  constructor: () ->
    link = (scope, element) ->
      hoveredClass = 'nexo-users-list-item-hovered'
      draggingClass = 'nexo-users-list-item-dragging'

      over = ->
        unless element.hasClass draggingClass
          element.addClass hoveredClass

      out = ->
        unless element.hasClass draggingClass
          element.removeClass hoveredClass

      element.hoverIntent({
        over: over
        out: out
        interval: 200
      })

      element.click(out)

    directive =
      restrict: 'C'
      link: link


    return directive