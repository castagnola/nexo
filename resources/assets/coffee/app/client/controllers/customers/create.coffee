class CreateCustomer extends Controller
  constructor: ($scope, Customer, CustomerForm) ->
    fields = CustomerForm

    vm = this
    vm.fields = fields
    vm.model = {}
