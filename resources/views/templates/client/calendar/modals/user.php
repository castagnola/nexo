<style>
    .k-scheduler-footer {
        display: none;
    }

    [kendo-scheduler] > .nexo-service {
        display: none;
    }
</style>

<div class="modal-header">
    <button type="button" class="close" aria-hidden="true" ng-click="close()"><i class="fa fa-close"></i></button>
    <h4 class="modal-title">Calendario de {{ user.name }}</h4>
</div>
<div class="modal-body">
    <div kendo-scheduler k-options="schedulerOptions">
        <div k-event-template class="nexo-service nexo-service-{{dataItem.status}}">
            <p>{{dataItem.title}}</p>
        </div>
    </div>
</div>

