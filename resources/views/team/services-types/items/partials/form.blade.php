<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    <div class="m-t-xxs">
        @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
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


<input name="service_type_id" type="hidden" value="{{ $serviceType->id }}"/>

<div class="form-group">
    <div class="text-right">
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary btn-lg']) !!}

        <a class="btn btn-default btn-lg" href="{{ route('team.services-types.services-items.index', [$team->slug, $serviceType->id])  }}">Cancelar</a>
    </div>
</div>

