class TeamStatsPolls extends Controller
  constructor: ($scope, $window, $http, API_URL, Team, NEXO, DATES_FORMATS) ->
    vm = this
    Team.bindOne NEXO.team_id, $scope, 'team'



