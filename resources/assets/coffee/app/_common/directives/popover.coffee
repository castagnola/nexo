popoverOpenedClassName = 'nexo-popover-opened'

class PopoverClose extends Directive
  constructor: ($timeout) ->
    link = (scope, element) ->
      element.on 'click', (event) ->
        etarget = angular.element(event.target)

        angular.element(".#{popoverOpenedClassName}").trigger('click').removeClass(popoverOpenedClassName)


    directive =
      link: link

    return directive


class PopoverElem extends Directive
  constructor: () ->
    link = (scope, element) ->
      element.on 'click', ->
        element.addClass popoverOpenedClassName
        return


    directive =
      link: link

    return directive