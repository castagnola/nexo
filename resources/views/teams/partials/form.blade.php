<div class="row">
    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Información básica</h3>
            </div>
            <div class="panel-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        <div class="m-t-xxs">
                            @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                    {!! Form::label('slug', 'URL', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div class="input-group m-b-sm">
                            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon" id="basic-addon2">.nexo.co</span>
                        </div>


                        <div class="m-t-xxs">
                            @foreach($errors->get('slug', '<span class="text-danger">:message</span>') as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                    {!! Form::label('logo', 'Logo', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div>
                            <div class="btn btn-default"
                                 ngf-select
                                 ng-model="logo"
                                 ngf-accept="'image/*'"
                                 ngf-drag-over-class="dragover">
                                @if(isset($item))
                                    Cambiar logo
                                @else
                                    Seleccionar logo
                                @endif
                            </div>

                            <div class="m-t-lg">
                                <img class="img-responsive" ng-src="@{{ cropperDataUrl }}"
                                     ng-cropper
                                     ng-if="showCropper"
                                     ng-cropper-options="options"
                                     ng-cropper-show="'show.cropper'"/>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Módulos</h3>
            </div>
            <ul class="list-group">
                @foreach($modules as $module)
                    <li class="list-group-item cf">
                        <div class="fl-l pt-s">
                            {{ $module->name }}
                        </div>

                        <div class="fl-r">
                            <input class="no-uniform check-switch" type="checkbox" name="modules[]" data-on-text="Activado"
                                   data-off-text="Desactivado"
                                   data-size="small" {{ isset($item) ? !empty($item->modules->find($module->id)) ? 'checked' : ''  : ''  }}
                                   data-on-color="success" data-off-color="danger" value="{{$module->id}}"/>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Límites de rol</h3>
            </div>
            <ul class="list-group">
                @foreach($roles as $roleKey => $role)
                    <?php
                    $limit = 1;

                    if (isset($item)) {
                        $roleLimit = $item->rolesLimits->where('role_id', $role->id)->first();

                        if (!empty($roleLimit)) {
                            $limit = $roleLimit->limit;
                        }
                    }

                    ?>
                    <li class="list-group-item cf">
                        <div class="fl-l pt-s">
                            {{ $role->name }}
                        </div>

                        <input type="hidden" name="roles_limits[{{$roleKey}}][role_id]" value="{{$role->id}}">

                        <div class="fl-r" style="max-width: 50px;">
                            <input type="number" name="roles_limits[{{$roleKey}}][limit]" class="form-control" min="1" value="{{$limit}}">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        @if(!isset($item))
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Información del usuario administrador
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('first_name', 'Nombres', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

                            <div class="m-t-xxs">
                                @foreach($errors->get('first_name', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('last_name', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            <div class="m-t-xxs">
                                @foreach($errors->get('last_name', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}

                            <div class="m-t-xxs">
                                @foreach($errors->get('email', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('password', 'Contraseña', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', ['class' => 'form-control']) !!}

                            <div class="m-t-xxs">
                                @foreach($errors->get('password', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <div class="text-right">
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary btn-lg']) !!}
            <a class="btn btn-default btn-lg" href="{{ route('teams.index') }}">Cancelar</a>
        </div>
    </div>
</div>
