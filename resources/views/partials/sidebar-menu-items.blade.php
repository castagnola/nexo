<ul class="menu accordion-menu">
    @foreach($items as $item)
        <li @lm-attrs($item) @if($item->hasChildren()) class="droplink" @endif @lm-endattrs>
            <a href="{!! $item->url() !!}" class="waves-effect waves-button">
                <span class="menu-icon {!! $item->icon !!}"></span>

                <p>{!! $item->title !!}</p>

                @if($item->hasChildren())<span class="arrow"></span>@endif
            </a>

            @if($item->hasChildren())
                <ul class="sub-menu">
                    @foreach($item->children() as $subitem)
                        <li  @lm-attrs($subitem) @lm-endattrs>
                            <a href="{!! $subitem->url() !!}">{!! $subitem->title !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>