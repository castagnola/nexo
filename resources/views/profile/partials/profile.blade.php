<div ng-controller="userController" class="pos-r">

    <div class="profile-cover" style="background:#828384; height:100px;">
        <div class="row">
            <div class="col-md-3 profile-image" style="margin-top:30px;">
                <div class="profile-image-container">
                    <img src="{{ $profile->present()->avatarUrl('150') }}" alt="Avatar de {{ $profile->present()->name }}"
                         style="background-color:#fff;">
                </div>
            </div>

        </div>
    </div>


    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 user-profile">
                <h3 class="text-center">
                    {{ $profile->present()->name }}
                </h3>

                <div class="text-center">
                    @foreach($profile->roles as $role)
                        <span class="label label-default text-uppercase mb-s d-ib">{{ $role->name }}</span>
                    @endforeach
                </div>

                <hr>

                <ul class="list-unstyled text-center" ng-hide="nexoform.$visible">
                    <li>
                        <p>
                            <i class="fa fa-envelope m-r-xs"></i>
                            {{ $profile->email }}
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Creado <span am-time-ago="'{{ $profile->created_at }}'"></span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Modificado <span am-time-ago="'{{ $profile->updated_at }}'"></span>
                        </p>
                    </li>
                    @if($profile->last_login)
                        <li>
                            <p>
                                <i class="fa fa-calendar m-r-xs"></i>
                                Último ingreso <span am-time-ago="'{{ $profile->last_login }}'"></span>
                            </p>
                        </li>
                    @endif
                </ul>

                <hr>

                <a href="{{ url('profile/edit') }}"
                   class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-pencil m-r-xs"></i> Editar
                </a>
            </div>

            <div class="col-md-4">
                @include('users.partials.contact', ['contactData' => $profile->contactData])
            </div>


            <div class="col-md-4">

            </div>
        </div>
    </div>
</div>