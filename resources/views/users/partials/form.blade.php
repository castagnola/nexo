<div class="row">
    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Información básica
                </h4>
            </div>
            <div class="panel-body">

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
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

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
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

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}

                        <div class="m-t-xxs">
                            @foreach($errors->get('email', '<span class="text-danger">:message</span>') as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    </div>
                </div>

                @if(!isset($item))
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
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

                    <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                        {!! Form::label('confirm_password', 'Confirmar contraseña', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}

                            <div class="m-t-xxs">
                                @foreach($errors->get('confirm_password', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>


        @if(isset($item))
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h4 class="panel-title">Cambiar contraseña</h4>
                </div>

                <div class="panel-body">
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
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

                    <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                        {!! Form::label('confirm_password', 'Confirmar contraseña', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}

                            <div class="m-t-xxs">
                                @foreach($errors->get('confirm_password', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="col-md-6">

        @if(isset($roles))
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Seleccione los grupos
                    </h4>
                </div>
                @if($errors->has('roles'))
                    <div class="panel-body">
                        <div class="m-t-xxs">
                            @foreach($errors->get('roles', '<span class="text-danger">:message</span>') as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="list-group">
                    @foreach($roles as $role)
                        <?php
                        $roleLimit = isset($team) ? $team->roleLimit($role->id) : false;
                        $canCreate = !empty($roleLimit) ? $roleLimit->remaining > 0 : true;
                        ?>

                        @if($canCreate)
                            <label class="list-group-item">
                                <input type="radio" name="roles[]" id="role-{{$role->id}}"
                                       value="{{$role->id}}" {{ (isset($item)) ? !$item->roles->where('id', $role->id)->isEmpty() ? 'checked' : '' : '' }} />

                                <div style="display: inline-block;">
                                    {{$role->name}}
                                    @if(!empty($roleLimit))
                                        <small class="text-muted">(Quedan {{$roleLimit->remaining}} usuarios por crear)</small>
                                    @endif
                                </div>
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <div class="panel panel-white" ng-init="contactData = []">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Datos de contacto
                </h4>
            </div>
            <div class="panel-body">

                @if(isset($item))
                    @foreach($item->contactData as $posContact => $contact)
                        <div class="row mb" id="contact-data-{{ md5($posContact) }}">
                            <div class="col-sm-4">
                                <select class="form-control" name="contactData[{{ md5($posContact) }}][type]">
                                    @foreach($contactTypes as $type)
                                        <option value="{{$type['slug']}}" {{ $type['slug'] == $contact->type ? 'selected' : '' }}>
                                            {{$type['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text"
                                       name="contactData[{{ md5($posContact) }}][value]"
                                       value="{{$contact->value}}"/>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="btn btn-danger" ng-click="removeElement('#contact-data-{{ md5($posContact) }}')"
                                     ng-if="!$first">
                                    <i class="fa fa-remove"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


                <div class="row mb" ng-repeat="contact in contactData" id="contact-data-@{{ $index }}">
                    <div class="col-sm-4">
                        <select class="form-control" name="contactData[@{{ $index }}][type]">
                            @foreach($contactTypes as $type)
                                <option value="{{$type['slug']}}">{{$type['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="contactData[@{{ $index }}][value]"/>
                    </div>
                    <div class="col-sm-2 text-center">
                        <div class="btn btn-danger" ng-click="removeElementFromCollection(contactData, {id:contact.id})">
                            <i class="fa fa-remove"></i>
                        </div>
                    </div>
                </div>

                <div class="row text-center mt-xl">
                    <div class="col-md-12">
                        <div class="btn btn-default btn-lg" ng-click="addRandomElementCollection(contactData)">
                            <i class="fa fa-plus"></i> Agregar dato de contacto
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">{{$submit_text}}</button>
            <a href="{{$returnUrl}}" class="btn btn-default btn-lg">Cancelar</a>
        </div>
    </div>
</div>

