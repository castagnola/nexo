<div class="panel panel-white">
    <div class="panel-heading">
        <h3 class="panel-title">Historial de cambios</h3>
    </div>

    <div class="panel-body">
        @if(!$historyItems->isEmpty())
            <div class="inbox-widget" style="height:auto!important;">
                @foreach($historyItems as $history )
                    <div class="inbox-item">
                        <div class="inbox-item-img">
                            <img src="{{ $history->userResponsible()->present()->avatarUrl('150') }}" class="img-circle"
                                 alt="">
                        </div>
                        <p class="inbox-item-author">
                            {{ $history->userResponsible()->present()->name }}
                        </p>

                        @if(in_array($history->key, ['logo']))
                            <div class="inbox-item-text" style="margin-left:56px;">
                                Ha cambiado el {{ $history->fieldName() }} a:

                                <div class="mt">
                                    <a href="{{ route('imagecache', ['original', $history->newValue()])  }}" target="_blank">
                                        <img class="img-responsive" src="{{ route('imagecache', ['small', $history->newValue()])  }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="inbox-item-text" style="margin-left:56px;">
                                {{ $history->fieldName() }} de {{ $history->oldValue() }} a {{ $history->newValue() }}
                            </div>
                        @endif

                        <p class="inbox-item-date">
                            <span am-time-ago="'{{ $history->created_at  }}'"></span>
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt text-center">No hay cambios para mostrar.</p>
        @endif
    </div>


</div>