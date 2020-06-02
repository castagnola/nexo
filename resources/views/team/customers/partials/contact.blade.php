<div class="panel panel-white">
    <div class="panel-heading">
        <h4 class="panel-title">Datos de contacto</h4>
    </div>

    <table class="table table-striped table-hover">
        <colgroup>
            <col style="width: 150px;">
        </colgroup>
        <tbody>
        @foreach($contactData as $contact)
            <tr>
                <th>
                    <i class="{{$contact->present()->getType['icon']}}"></i>
                    <span>{{$contact->present()->getType['name']}}</span>
                </th>
                <td>{{$contact->value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($contactData->isEmpty())
        <div class="panel-body">
            <p class="text-center">No hay información para mostrar.</p>
        </div>
    @endif
</div>