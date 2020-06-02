class Customers extends Controller
  constructor: ($scope, NEXO, Customer, uiGridConstants) ->
    gridOptions = {
      enableGridMenu: true
      exporterMenuCsv: true
      enableFiltering: false

      enableColumnResizing: true


      onRegisterApi: (gridApi) ->
        vm.gridApi = gridApi

      columnDefs: [
        {
          name: 'Nombres'
          field: 'first_name'
        }
        {
          name: 'Apellidos'
          field: 'last_name'
        }
        {
          name: 'Email'
          field: 'email'
        }
        {
          name: 'Documento'
          field: 'document'
        }
        {
          name: 'Dirección'
          field: 'addresses.data[0].street'
        }
        {
          name: 'Teléfono'
          field: 'phones.data[0].phone'
        }
        {
          name: '# Servicios'
          field: 'services_count'
          visible: false
        }
        {
          name: 'Creado'
          field: 'created_at.date'
          enableFiltering: false
          cellTemplate: '<div class="ui-grid-cell-contents" title="TOOLTIP">{{COL_FIELD CUSTOM_FILTERS | amTimeAgo}}</div>'
        }
        {
          name: 'Modificado'
          field: 'updated_at.date'
          enableFiltering: false
          cellTemplate: '<div class="ui-grid-cell-contents" title="TOOLTIP">{{COL_FIELD CUSTOM_FILTERS | amTimeAgo}}</div>'
          visible: false
        }
        {
          name: ''
          field: 'id'
          cellTemplate: """
            <div class="ui-grid-cell-contents ui-grid-cell-contents-actions">
              <a ng-href="/customers/{{ COL_FIELD }}/edit" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
            </div>
          """
          maxWidth: 80
          cellClass: 'ta-c'
          enableSorting: false
          enableColumnMenu: false
          enableFiltering: false
          enableHiding: false
        }
      ]
    }

    vm = this
    vm.grid = gridOptions
    vm.loading = true

    vm.toggleFiltering = ->
      vm.grid.enableFiltering = !vm.grid.enableFiltering
      vm.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN)

    Customer.findAll({}, {
      bypassCache: true
    }).finally(() ->
      vm.loading = false
    )

    Customer.bindAll({}, $scope, 'customers', (cb, data) ->
      vm.grid.data = data
    )