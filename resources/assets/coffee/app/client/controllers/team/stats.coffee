class TeamStats extends Controller
  constructor: ($scope, $window, $http, API_URL, Team, NEXO, DATES_FORMATS) ->
    onExport = ($event, chart) ->
      ExcellentExport.excel($event, "#{chart}-table", 'Nombre del archivo')
      return


    charts = ['services', 'users']

    loadChart = (chart) ->
      dates = vm.dates[chart]

      start = moment(dates.start).startOf('month')
      end = moment(dates.end).endOf('month')

      params = {
        start: start.format(DATES_FORMATS.DATE),
        end: end.format(DATES_FORMATS.DATE)
      }

      vm.loadingChart[chart] = true
      $http(
        url: "#{API_URL}stats/#{chart}",
        params: params
      ).success((response) ->
        vm.chartData[chart] = response
        vm.loadingChart[chart] = false
      )

      vm.files[chart] = "desde-#{start.format('YYYY-MM')}-hasta-#{end.format('YYYY-MM')}.xls"


    vm = this
    vm.loadingChart = {}
    vm.chartData = {}
    vm.dates = {}
    vm.files = {}
    vm.defaultStartDate = moment($window.NEXO.teamCreatedAt)
    vm.defaultEndDate = moment($window.NEXO.teamCreatedAt).add(6, 'months')


    charts.map((chart) ->
      vm.dates[chart] = {
        start: vm.defaultStartDate.toDate()
        end: vm.defaultEndDate.toDate()
      }

      $scope.$watch(() ->
        return vm.dates[chart]
      , (newDates) ->
        loadChart(chart)
      , true)
    )

    vm.onExport = onExport


    Team.bindOne NEXO.team_id, $scope, 'team'



