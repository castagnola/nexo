<style>
    .nexo-service-{
        display: none;
    }
    .k-scheduler-footer{
        display: none;
        visibility: hidden;
    }
</style>

<div kendo-scheduler="nexoScheduler" k-options="schedulerOptions">
    <div k-event-template class="nexo-service nexo-service-{{dataItem.status}}">
        <p>{{dataItem.title}}</p>
    </div>
</div>
