class Nexo extends Constant
  constructor: ->
    return window.NEXO or {}

class ApiUrl extends Constant
  constructor: ->
    return window.NEXO.api_url or '/api/'

class UiUrl extends Constant
  constructor: ->
    return window.NEXO.ui_url or '/ui'

class TemplateUrl extends Constant
  constructor: ->
    return window.NEXO.template_url or '/ui/template'

class CsrfToken extends Constant
  constructor: ->
    return angular.element('meta[name="csrf-token"]').attr('content')

class UserId extends Constant
  constructor: ->
    return window.NEXO.uid or null

class DatesFormats extends Constant
  constructor: ->
    return {
    DATE: 'YYYY-MM-DD'
    DATETIME: 'YYYY-MM-DD HH:mm:ss'
    HOUR_CLIENT: 'hh:mmA'
    HOUR_SERVER: 'HH:mm'
    }


class Is extends Constant
  constructor: () ->
    return window['is']

class NexoMarkers extends Constant
  constructor: () ->
    return {
    HOME: {
      RED: markerUrl('home-red')
    }
    }