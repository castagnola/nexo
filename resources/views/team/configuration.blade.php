@extends('layouts.team')

@section('content')

    <style>
        /* For this slider, disable the 'origin' size. */
        .slider .noUi-origin {
            right: auto;
            width: 0;
        }

        /* Position the bar and color it. */
        .slider .connect {
            position: absolute;
            top: 0;
            bottom: 0;
            background: #F25656;
            box-shadow: inset 0 0 3px rgba(51, 51, 51, 0.45);
        }

        /* When the slider is moved by tap,
           transition the connect bar like the handle. */
        .slider.noUi-state-tap .connect {
            -webkit-transition: left 300ms, right 300ms;
            transition: left 300ms, right 300ms;
        }

        #step.noUi-connect {
            background: #F25656;
        }
    </style>

    <div class="page-title">
        <h3>Configuración</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">General</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <div class="h3 panel-title">Jornada laboral</div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', 'Inicio de jornada laboral') !!}

                            <div class="row pt pb">
                                <div class="col-sm-2 text-right">
                                    <span class="work-time-start"></span>
                                </div>
                                <div class="col-sm-8">
                                    <div class="slider" id="connect"></div>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <span class="work-time-end"></span>
                                </div>
                            </div>

                            <div class="m-t-xxs">
                                @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', 'Duración en minutos') !!}

                            <div class="row pt pb">
                                <div class="col-sm-10">
                                    <div id="step"></div>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <span class="work-time-minutes"></span>
                                </div>
                            </div>

                            <div class="m-t-xxs">
                                @foreach($errors->get('name', '<span class="text-danger">:message</span>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <form action="{{ route('team.configuration.save', $team->slug) }}" method="post">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                            <input name="work_time_start" type="hidden" value="{{$team->work_time_start}}"/>
                            <input name="work_time_end" type="hidden" value="{{$team->work_time_end}}"/>
                            <input name="work_time_minutes" type="hidden" value="{{$team->work_time_minutes}}"/>

                            <div class="btn btn-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer-scripts')
    <script>
        $workTimeStart = $('input[name="work_time_start"]');
        $workTimeEnd = $('input[name="work_time_end"]');
        $workTimeMinutes = $('input[name="work_time_minutes"]');

        var connectSlider = document.getElementById('connect');

        noUiSlider.create(connectSlider, {
            start: [
                moment($workTimeStart.val(), 'HH:mm:ss').hour(),
                moment($workTimeEnd.val(), 'HH:mm:ss').hour()
            ],
            connect: false,
            step: 1,
            range: {
                'min': 0,
                'max': 24
            }
        });

        var connectBar = document.createElement('div'),
                connectBase = connectSlider.getElementsByClassName('noUi-base')[0],
                connectHandles = connectSlider.getElementsByClassName('noUi-origin');

        // Give the bar a class for styling and add it to the slider.
        connectBar.className += 'connect';
        connectBase.appendChild(connectBar);

        connectSlider.noUiSlider.on('update', function (values, handle) {

            // Pick left for the first handle, right for the second.
            var side = handle ? 'right' : 'left';
            // Get the handle position and trim the '%' sign.
            var offset = (connectHandles[handle].style.left).slice(0, -1);

            // Right offset is 100% - left offset
            if (handle === 1) {
                offset = 100 - offset;
            }

            connectBar.style[side] = offset + '%';

            var start = _.parseInt(values[0]);
            var end = _.parseInt(values[1]);
            var startTime = moment().hour(start).minutes(0);
            var endTime = moment().hour(end).minutes(0);

            $('.work-time-start').html(startTime.format('hh:mm A'));
            $('.work-time-end').html(endTime.format('hh:mm A'));

            $workTimeStart.val(startTime.format('HH:mm:ss'));
            $workTimeEnd.val(endTime.format('HH:mm:ss'));
        });


        var stepSlider = document.getElementById('step');

        noUiSlider.create(stepSlider, {
            start: [$workTimeMinutes.val()],
            connect: 'lower',
            snap: true,
            range: {
                'min' : 15,
                '50%' : 30,
                'max' : 60
            }
        });

        stepSlider.noUiSlider.on('update', function (values) {
            var minutes = _.parseInt(values[0]);
            $workTimeMinutes.val(minutes);
            $('.work-time-minutes').html(minutes);
        });
    </script>
@endsection
