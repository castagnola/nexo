<div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Información básica</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        <div class="m-t-xxs">
                            @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('description', 'Descripción', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" ng-repeat="question in ctrl.questions track by $index">
            <div class="panel panel-white">
                <div class="panel-heading cf">
                    <div class="fl-l">
                        <h3 class="panel-title">Pregunta #@{{$index+1}}</h3>
                    </div>
                    <div class="fl-r" ng-if="ctrl.questions.length > 1">
                        <div class="btn btn-default" ng-click="ctrl.removeQuestion(question)">
                            <i class="fa fa-remove"></i>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!! Form::label('name', 'Tipo de pregunta', ['class' => 'control-label']) !!}

                                <select class="form-control input-lg" name="questions[@{{$index}}][type]" ng-model="question.type">
                                    <option value="open" selected>Abierta</option>
                                    <option value="multiple">Múltiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!! Form::label('question', 'Pregunta', ['class' => 'control-label']) !!}

                                <input class="form-control input-lg" type="text" name="questions[@{{$index}}][name]"
                                       placeholder="Escriba el texto de la pregunta acá..."/>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped" ng-show="question.type == 'multiple'">
                    <tbody>
                    <tr ng-repeat="option in question.options track by $index">
                        <td>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!! Form::label('option', 'Opción @{{ $index+1 }}', ['class' => 'control-label']) !!}

                                <input class="form-control" type="text"
                                       name="questions[@{{$parent.$index}}][options][@{{$index}}][option]"
                                       placeholder="Escriba el texto de la respuesta acá..."/>
                            </div>
                        </td>
                        <td class="ta-r" style="width: 20px;">
                            <div class="btn btn-default mt-l" ng-click="ctrl.removeOption(question, option)"
                                 ng-show="question.options.length > 1">
                                <i class="fa fa-remove"></i>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" class="ta-c">
                            <div class="btn btn-default" ng-click="ctrl.addOption(question)">
                                <i class="fa fa-plus"></i> Agregar opción
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="btn btn-default" ng-click="ctrl.addQuestion()">
                    <i class="fa fa-plus"></i> Agregar pregunta
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="text-right">
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary btn-lg']) !!}
                <a class="btn btn-default btn-lg" href="{{ route('teams.index') }}">Cancelar</a>
            </div>
        </div>
    </div>
</div>

{!! Form::hidden('team_id', $team->id) !!}