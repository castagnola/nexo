class FormlyConfig extends Config
  constructor: (formlyConfigProvider, IS) ->
    formlyConfigProvider.extras.removeChromeAutoComplete = true

    ###*
      * Input tipo email
    ###
    formlyConfigProvider.setType({
      name: 'email',
      template: '<input type="email" class="form-control" ng-model="model[options.key]">',
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
    })

    ###*
      * Input tipo password
    ###
    formlyConfigProvider.setType({
      name: 'password',
      template: '<input type="password" class="form-control" ng-model="model[options.key]" autocomplete="off">',
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
    })


    ###*
      * Input tipo password
    ###
    formlyConfigProvider.setType({
      name: 'multiCheckboxSwitch',
      templateUrl: commonTemplateUrl('fields/multi-checkbox-switch'),
      extends: 'multiCheckbox'
    })


    ###*
      * Input tipo password
    ###
    formlyConfigProvider.setType({
      name: 'rolesLimit',
      templateUrl: commonTemplateUrl('fields/roles-limit'),
      wrapper: ['bootstrapHasError']
    })

    ###*
      * Selector de ciudades
    ###
    formlyConfigProvider.setType({
      name: 'cities',
      templateUrl: commonTemplateUrl('fields/cities')
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
      controller: ['$scope', 'City', 'API_URL', ($scope, City, API_URL) ->
        $scope.cities = []

        defaultCityId = _.get($scope, 'model.city_id') or false

        if defaultCityId
          City.find(defaultCityId).then((response) ->
            $scope.cities.push response
          )

        $scope.getCities = ($query) ->
          return false if _.isEmpty $query

          return City.findAll({
            search: $query
            orderBy: 'name',
            sortedBy: 'asc'
          }).then((response) ->
            return response
          )

        $scope.$watch("model.#{$scope.options.key}", (nv) ->
          id = _.get(nv, 'id') or null
          $scope.model[$scope.options.key + '_id'] = id
        )
      ]
    })

    ###*
      * Campo de repetición
    ###
    unique = 1
    formlyConfigProvider.setType
      name: 'repeatSection',
      templateUrl: commonTemplateUrl('fields/repeat-section')
      controller: ['$scope', ($scope) ->
        addRandomIds = (fields) ->
          unique++
          angular.forEach fields, (field, index) ->
            if field.fieldGroup
              addRandomIds field.fieldGroup
              return
            # fieldGroups don't need an ID
            if field.templateOptions and field.templateOptions.fields
              addRandomIds field.templateOptions.fields
            field.id = field.id or field.key + '_' + index + '_' + unique + getRandomInt(0, 9999)
            return
          return

        copyFields = (fields) ->
          fields = angular.copy(fields)
          addRandomIds fields
          fields

        addNew = ->
          $scope.model[$scope.options.key] = $scope.model[$scope.options.key] or []
          repeatsection = $scope.model[$scope.options.key]

          newsection = {}
          repeatsection.push newsection

          return


        getRandomInt = (min, max) ->
          Math.floor(Math.random() * (max - min)) + min

          $scope.formOptions =
            formState: $scope.formState
          $scope.addNew = addNew
          $scope.copyFields = copyFields


        $scope.formOptions = {formState: $scope.formState}
        $scope.addNew = addNew;
        $scope.copyFields = copyFields


        if _.isEmpty($scope.model[$scope.options.key])
          $scope.model[$scope.options.key] = [{}]


        checkValidity = (expression) ->
          if $scope.to.required
            valid = false
            expression

            $scope.fc.$setValidity('required', valid)

        if $scope.to.required
          unwatchFormControl = $scope.$watch 'fc', (nv) ->
            return  unless nv
            checkValidity(true)
            unwatchFormControl()

            $scope.$watch "model.#{$scope.options.key}", (nv) ->
              checkValidity(true)
      ]

    ###*
      * Selector de imagen
    ###
    formlyConfigProvider.setType
      name: 'image'
      templateUrl: commonTemplateUrl('fields/image')
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
      controller: ['$q', '$rootScope', '$scope', '$timeout', 'Cropper', ($q, $rootScope, $scope, $timeout, Cropper) ->
        $scope.showCropper = false
        $scope.cropperNewData = false
        $scope.currentImage = angular.copy $scope.model[$scope.options.key]

        $scope.change = (file) ->
          if file
            Cropper.encode(file).then((dataUrl) ->
              $scope.showCropper = true
              $scope.cropperDataUrl = dataUrl
              $scope.cropperFile = file
              $timeout ->
                $scope.$broadcast 'show.cropper'
            )

        $scope.cropperOptions = {
          viewMode: 1
          crop: (cropperNewData) ->
            $scope.cropperNewData = cropperNewData
        }

        $rootScope.$processImageField = ->
          deferred = $q.defer()

          if !_.isUndefined($scope.cropperFile) and $scope.cropperNewData
            console.debug 'accepted image', $scope.cropperFile, $scope.cropperNewData

            Cropper.crop($scope.cropperFile, $scope.cropperNewData).then(Cropper.encode).then((newDataUrl) ->
              $scope.model[$scope.options.key] = newDataUrl


              deferred.resolve()
            , (errorResponse) ->
              console.error errorResponse
            )
          else
            $scope.model[$scope.options.key] = null
            deferred.resolve()

          return deferred.promise
      ]


    formlyConfigProvider.setType
      name: 'ui-select',
      extends: 'select',
      templateUrl: commonTemplateUrl('fields/ui-select-single')


    ###*
      * Selector tipo ui-select
    ###
    formlyConfigProvider.setType
      name: 'ui-select-single',
      extends: 'select',
      templateUrl: commonTemplateUrl('fields/ui-select-single')
      controller: ['$scope', ($scope) ->
        keyId = $scope.options.key + '_id'

        $scope.$watch("model.#{$scope.options.key}", (nv) ->
          id = _.get nv, 'id'
          _.set $scope.model, keyId, id
        )
      ]

    formlyConfigProvider.setType
      name: 'ui-select-single-id',
      extends: 'select',
      templateUrl: commonTemplateUrl('fields/ui-select-single')

    ###*
      * Selector de fecha de servicio
    ###
    formlyConfigProvider.setType
      name: 'service-date',
      extends: 'input',
      templateUrl: commonTemplateUrl('fields/service-date')
      controller: 'serviceDateFieldController'


    ###*
      * Selector de fecha de servicio
    ###
    formlyConfigProvider.setType
      name: 'service-assignment-type',
      extends: 'input',
      templateUrl: commonTemplateUrl('fields/service-assignment-type')


    ###*
      * Drag/Drop de usuarios
    ###
    formlyConfigProvider.setType
      name: 'service-assignments-form',
      templateUrl: commonTemplateUrl('fields/services/assignments-form')
      controller: 'servicesAssignmentsFormFieldController as vm'

    ###*
      * Drag/Drop de usuarios
    ###
    formlyConfigProvider.setType
      name: 'service-address',
      templateUrl: commonTemplateUrl('fields/services/address')
      extends: 'input'
      controller: 'serviceAddressFieldController'


    formlyConfigProvider.setWrapper({
      name: 'validation',
      types: ['input', 'password', 'email', 'cities', 'ui-select', 'ui-select-single', 'ui-select-single-id', 'clockpicker'],
      templateUrl: commonTemplateUrl('fields/error-messages')
    })



    ###*
      * Input tipo duración
    ###
    formlyConfigProvider.setType({
      name: 'duration',
      templateUrl: commonTemplateUrl('fields/duration')
      wrapper: ['bootstrapLabel', 'bootstrapHasError']
      controller: 'durationFieldController'
    })


    ###*
      * Input tipo hora
    ###
    formlyConfigProvider.setType({
      name: 'clockpicker',
      templateUrl: commonTemplateUrl('fields/clockpicker')
      wrapper: ['bootstrapLabel', 'bootstrapHasError'],
      controller: 'clockpickerFieldController'
    })


class FormlyRun extends Run
  constructor: (formlyConfig, formlyValidationMessages) ->
    formlyConfig.extras.errorExistsAndShouldBeVisibleExpression = 'fc.$touched || form.$submitted';

    formlyValidationMessages.addStringMessage('required', 'Este campo es requerido');
    formlyValidationMessages.addStringMessage('email', 'El email es inválido');



