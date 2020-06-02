class UsersForm extends Controller
  constructor: ($scope, $rootScope, $state, $stateParams, User, UserForm, editMode) ->
    onSubmitSuccess = (response) ->
      toastr.success if editMode then 'Usuario editado correctamente' else 'Usuario creado correctamente'
      $state.go 'users'

    onSubmitFinally = ->
      vm.submitting = false

    onSubmit = ->
      if vm.form.$valid
        vm.submitting = true

        $rootScope.$processImageField().then(() ->
          if editMode
            User.update($stateParams.userId, vm.model).then(onSubmitSuccess).finally(onSubmitFinally)
          else
            User.create(vm.model).then(onSubmitSuccess).finally(onSubmitFinally)
        )

    vm = this
    vm.fields = UserForm
    vm.model = {}
    vm.onSubmit = onSubmit

    if editMode
      user = User.get($stateParams.userId)
      model = _.clone(user)
      model.contact = _.map(_.get(model, 'contact.data') or [], (contact) ->
        contact.type = contact.type.slug
        return contact
      )

      _.set(model.transports, [])

      model.transports = _.get(user, 'transports.data') or (_.get(user, 'transports') or [])
      model.avatar = _.get(model, 'avatar.medium') or null

      console.log 'user', model

      vm.model = model