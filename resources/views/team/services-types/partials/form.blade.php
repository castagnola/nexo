<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    <div class="m-t-xxs">
        @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
            {!! $error !!}
        @endforeach
    </div>
</div>

<div class="form-group {{ $errors->has('avg_response_time') ? 'has-error' : '' }}">
    {!! Form::label('avg_response_time', 'Tiempo estimado de respuesta HH:MM') !!}


    <div class="input-group bootstrap-timepicker timepicker">
        {!! Form::text('avg_response_time', null, ['class' => 'form-control', 'id' => 'timepicker']) !!}
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
    </div>

    <div class="m-t-xxs">
        @foreach($errors->get('avg_response_time', '<span class="text-danger">:message</span>') as $error)
            {!! $error !!}
        @endforeach
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', 'Descripción') !!}

    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    <div class="m-t-xxs">
        @foreach($errors->get('description', '<span class="text-danger">:message</span>') as $error)
            {!! $error !!}
        @endforeach
    </div>
</div>


<input name="team_id" type="hidden" value="{{ $team->id }}"/>

<div class="form-group">
    <div class="text-right">
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary btn-lg']) !!}

        <a class="btn btn-default btn-lg" href="{{ route('team.services-types.index', $team->slug)  }}">Cancelar</a>
    </div>
</div>


@section('footer-scripts')
    <script>
        $('#timepicker').timepicker({
            showMeridian: false,
            minuteStep: 5, //parseInt('{{$team->work_time_minutes}}'),
            defaultTime: '00:00',
            snapToStep: true
        });
    </script>
@endsection
