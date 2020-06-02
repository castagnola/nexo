<div class="text-center mt mb" ng-hide="gridIsRendered">
    <h4><i class="fa fa-spin fa-spinner"></i> Cargando disponibilidad de ruteros...</h4>
</div>

<div ng-show="gridIsRendered">
    <div class="mt mb cf">
        <div class="ta-c">
            <div class="d-ib ta-c">
                <a class="btn btn-default mr" href ng-click="prevWeek()"><i class="fa fa-chevron-left"></i></a>
                <span>{{ initialDay | amDateFormat:'LL' }} - {{ endDay | amDateFormat:'LL' }}</span>
                <a class="btn btn-default ml" href ng-click="nextWeek()"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <table class="table">
        <tbody>
        <tr>
            <td class="nexo-timeline-container-cell nexo-timeline-legend">
                <div class="nexo-timeline-container nexo-timeline-header">
                    <table class="nexo-timeline-table nexo-timeline-table-layout-auto table">
                        <tbody>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td class="nexo-timeline-container-separator">&nbsp;</td>
            <td class="nexo-timeline-container-cell">
                <div class="nexo-timeline-container nexo-timeline-header">
                    <div class="nexo-timeline-wrap">
                        <table class="nexo-timeline-table table nexo-timeline-days nexo-timeline-table-wrap">
                            <tbody>
                            <tr id="nexo-timeline-table-header-days"></tr>
                            <tr id="nexo-timeline-table-header-hours"></tr>
                            <tr class="hide" id="nexo-timeline-table-header-hours-divisions"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="nexo-timeline-container-cell nexo-timeline-legend">
                <div class="nexo-timeline-container">
                    <table id="nexo-timeline-users-wrap"
                           class="nexo-timeline-table nexo-timeline-table-layout-auto table nexo-timeline-users">
                        <tbody>
                        <tr ng-repeat="user in users" data-user-id="{{user.id}}">
                            <th>{{user.name}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td class="nexo-timeline-container-separator">&nbsp;</td>
            <td class="nexo-timeline-container-cell">
                <div class="nexo-timeline-content">
                    <table id="nexo-timeline-content-table" class="table nexo-timeline-table nexo-timeline-table-wrap"></table>
                    <div id="nexo-timeline-services"></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

</div>