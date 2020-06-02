class TeamStatsUsers extends Controller
  constructor: ($scope, $window, $http, API_URL, Team, NEXO, DATES_FORMATS) ->
    loadChart = () ->
      dates = vm.dates

      start = moment(dates.start).startOf('month')
      end = moment(dates.end).endOf('month')

      params = {
        start: start.format(DATES_FORMATS.DATE),
        end: end.format(DATES_FORMATS.DATE)
      }

      vm.loadingChart = true
      $http(
        url: "#{API_URL}stats/users",
        params: params
      ).success((response) ->
        vm.chartData = response
        vm.loadingChart = false
      )

      vm.file = "desde-#{start.format('YYYY-MM')}-hasta-#{end.format('YYYY-MM')}.xls"


    vm = this
    vm.chartData = {}
    vm.defaultStartDate = moment($window.NEXO.teamCreatedAt)
    vm.defaultEndDate = moment($window.NEXO.teamCreatedAt).add(6, 'months')


    vm.dates = {
      start: vm.defaultStartDate.toDate()
      end: vm.defaultEndDate.toDate()
    }

    $scope.$watch(() ->
      return vm.dates
    , loadChart, true)

    Team.bindOne NEXO.team_id, $scope, 'team'



