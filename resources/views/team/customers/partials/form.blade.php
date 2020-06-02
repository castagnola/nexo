<div class="row">
    <div class="col-md-4">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Información del cliente
                </h4>
            </div>
            <div class="panel-body">

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    {!! Form::label('first_name', 'Nombres', ['class' => 'control-label']) !!}

                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

                    <div class="m-t-xxs">
                        @foreach($errors->get('first_name', '<span class="text-danger">:message</span>') as $error)
                            {!! $error !!}
                        @endforeach
                    </div>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    {!! Form::label('last_name', 'Apellidos', ['class' => 'control-label']) !!}

                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

                    <div class="m-t-xxs">
                        @foreach($errors->get('last_name', '<span class="text-danger">:message</span>') as $error)
                            {!! $error !!}
                        @endforeach
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

                    {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}

                    <div class="m-t-xxs">
                        @foreach($errors->get('email', '<span class="text-danger">:message</span>') as $error)
                            {!! $error !!}
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Direcciones
                </h4>
            </div>
            <div class="panel-body">
                @foreach($item->addresses as $key => $address)
                    <div>
                        <small class="text-muted mb">Dirección #{{$key+1}}</small>


                        <div class="form-group">
                            <label for="#" class="control-label">Ciudad</label>

                            {!! Form::select('size', $cities->lists('name', 'id')->toArray(), $address->city_id, ['class' => 'selectize']) !!}
                        </div>

                        <div>
                            <label for="#" class="control-label">Dirección</label>

                            <textarea name="addresses[{{$key}}][street]" id="" cols="30" rows="10" class="form-control">{{ $address->street }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="panel-footer ta-c">
                <div class="btn btn-default">
                    <i class="fa fa-plus"></i> Añadir otra dirección
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Telefonos
                </h4>
            </div>
            <div class="panel-body">


            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
            <a href="{{$returnUrl}}" class="btn btn-default btn-lg">Cancelar</a>
        </div>
    </div>
</div>


@section('footer-scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>

    <script>
        $('.selectize').selectize({
            create: false,
            sortField: 'text'
        });
    </script>
@endsection

