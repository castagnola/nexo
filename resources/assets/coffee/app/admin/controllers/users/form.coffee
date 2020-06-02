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
      model = _.clone(User.get($stateParams.userId))
      model.contact = _.map(_.get(model, 'contact.data') or [], (contact) ->
        contact.type = contact.type.slug
        return contact
      )
      model.transports = _.get(model, 'transports.data') or (_.get(model, 'transports') or [])
      model.avatar = _.get(model, 'avatar.medium') or null


      vm.model = model