@isset($page)
    <ul class="pagination">
        <li class="{{ $page == 0 ? 'disabled' : 'waves-effect' }}"><a
                href="{{ route($route, ['page' => '0']) }}" style="padding-right: 0"><i
                    class="material-icons">first_page</i></a></li>
        <li class="{{ $page == 0 ? 'disabled' : 'waves-effect' }}"><a
                href="{{ route($route, ['page' => $page - 1]) }}" style="padding-left: 0"><i
                    class="material-icons">chevron_left</i></a></li>
        @if ($page == 0)
            <li class="active"><a href="{{ route($route, ['page' => $page]) }}">1</a></li>
            @for ($i = 1; $i <= 4; $i++)
                <li class="waves-effect"><a href="{{ route($route, ['page' => $i]) }}">{{ $i + 1 }}</a></li>
            @endfor
        @elseif($page == 1)
            <li class="waves-effect"><a href="{{ route($route, ['page' => '0']) }}">1</a></li>
            <li class="active"><a href="{{ route($route, ['page' => $page]) }}">2</a></li>
            @for ($i = 2; $i <= 4; $i++)
                <li class="waves-effect"><a href="{{ route($route, ['page' => $i]) }}">{{ $i + 1 }}</a></li>
            @endfor
        @else
            @for ($i = 2; $i >= 1; $i--)
                <li class="waves-effect"><a
                        href="{{ route($route, ['page' => $page - $i]) }}">{{ $page - $i + 1 }}</a></li>
            @endfor
            <li class="active"><a href="{{ route($route, ['page' => $page]) }}">{{ $page + 1 }}</a></li>
            @for ($i = 1; $i <= 2; $i++)
                <li class="waves-effect"><a
                        href="{{ route($route, ['page' => $page + $i]) }}">{{ $page + $i + 1 }}</a></li>
            @endfor
        @endif
        <li class="waves-effect"><a href="{{ route($route, ['page' => $page + 1]) }}"><i
                    class="material-icons">chevron_right</i></a></li>
    </ul>
@endisset
