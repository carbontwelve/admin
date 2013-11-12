{{-- Does this node have any children? --}}
@if( ! empty($children) )
<li class="dropdown {{ ( ($current === true) ? 'active current-nav' : '' ) }}">
    <a href="{{ $href }}" class="{{ $class }} dropdown-toggle {{ ( ($current === true) ? 'active' : '' ) }}">

        {{-- Does this node have an icon? --}}
        @if( !empty($icon) )
        <span class="glyphicon {{ $icon }}"></span>
        @endif

        {{ $text }}

        {{-- If this node has children then we should display the drop down --}}
        @if ( $current === true )
        <span class="glyphicon glyphicon-chevron-down"></span>
        @else
        <span class="glyphicon glyphicon-chevron-right"></span>
        @endif

        {{-- Current Pointer --}}
        @if ( $current === true )
        <div class="current-pointer">
            <div class="arrow"></div>
        </div>
        @endif
    </a>
    <ul class="{{ ( ($current === true) ? 'active' : '' ) }}">
        {{ $children }}
    </ul>
</li>
@else
{{-- This node has no children --}}
<li>
    <a href="{{ $href }}" class="{{ $class }} {{ ( ($current === true) ? 'active' : '' ) }}">

        {{-- Does this node have an icon? --}}
        @if( !empty($icon) )
        <span class="glyphicon {{ $icon }}"></span>
        @endif

        {{ $text }}

        {{-- If this node has children then we should display the drop down --}}
        @if ( $current === true )
        <span class="glyphicon glyphicon-chevron-down"></span>
        @else
        <span class="glyphicon glyphicon-chevron-right"></span>
        @endif

        {{-- Current Pointer --}}
        @if ( $current === true )
        <div class="current-pointer">
            <div class="arrow"></div>
        </div>
        @endif
    </a>
</li>
@endif
