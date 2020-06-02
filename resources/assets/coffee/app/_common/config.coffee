class Config extends Config
  constructor: (DSProvider, DSHttpAdapterProvider, API_URL, uiGmapGoogleMapApiProvider, uiSelectConfig, $httpProvider) ->
    bootbox.setDefaults({
      locale: 'es'
    })

    # Switch
    $.fn.bootstrapSwitch.defaults.onColor = 'success'
    $.fn.bootstrapSwitch.defaults.offColor = 'danger'


    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'fadeIn',
      hideMethod: 'fadeOut',
      timeOut: 5000
    }

    angular.extend(DSHttpAdapterProvider.defaults, {basePath: API_URL})

    uiSelectConfig.theme = 'selectize'


    $httpProvider.interceptors.push('HTTPRequestInterceptor')


class Run extends Run
  constructor: ($rootScope, editableOptions, DS, i18nService, DTDefaultOptions, NEXO) ->
    editableOptions.theme = 'bs3'
    $rootScope.DSMetas = []

    i18nService.setCurrentLang('es')

    $rootScope.removeElement = (element) ->
      $(element).remove()
      return

    $rootScope.removeElementFromCollection = (collection, query) ->
      return _.remove collection, query

    $rootScope.addRandomElementCollection = (collection) ->
      collection.push {id: _.uniqueId()}


    DTDefaultOptions.setLanguage({
      sUrl: '/assets/js/spanish.json'
    })


    $rootScope.$on '$viewContentLoaded', () ->
      angular.element('.loader').remove()
      angular.element('.nexo-content').show()


    $rootScope.$hasRole = (roleName) ->
      check = _.some(NEXO.roles, (role) ->
        return role is roleName
      )
      return check


    $rootScope.$hasAnyRole = (roles) ->
      rolesHave = _.filter(roles, (role) ->
        return $rootScope.$hasRole(role)
      )
      return !_.isEmpty(rolesHave)

    $rootScope.$hasAccess = (permission) ->
      right = _.get(NEXO, "rights[#{permission}]") or false
      return right



