@isset($page)
    <ul class="pagination">
        <li class="{{ $page == 1 ? 'disabled' : 'waves-effect' }}"><a
                href="{{ route($route, ['page' => 1]) }}" style="padding-right: 0"><i
                    class="material-icons">first_page</i></a></li>
        <li class="{{ $page == 1 ? 'disabled' : 'waves-effect' }}"><a
                href="{{ route($route, ['page' => $page - 1]) }}" style="padding-left: 0"><i
                    class="material-icons">chevron_left</i></a></li>
        @for($i = 1; $i <= 5; $i++)
            @php
                $ii = ($page < 3) ? $page : 3;
                $index = $page - $ii + $i;
            @endphp
            @if($page == $index)
                <li class="active"><a
                    href="{{ route($route, ['page' => $index]) }}">{{ $index }}</a></li>
            @elseif($index <= $pageMax)
                <li class="waves-effect"><a
                    href="{{ route($route, ['page' => $index]) }}">{{ $index }}</a></li>
            @endif
            
        @endfor
        <li class="{{ $page == $pageMax ? 'disabled' : 'waves-effect' }}"><a 
                href="{{ route($route, ['page' => $page + 1]) }}"><i
                    class="material-icons">chevron_right</i></a></li>
    </ul>
@endisset
