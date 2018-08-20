
@if(isset($footer_menu) && count($footer_menu))
    @foreach($footer_menu as $fmenu)
    <div class="col-sm-4">
        <div class="listFooter">
            <span class="title">{{ $fmenu['data']['name'] }}</span>
            <div class="info-pg">
            @if($fmenu['data']['children_count'])
            @foreach($fmenu['childs'] as $child)
                <a class="footer-menu-link" href="{{ $child['data']['url'] }}">
                    <span>{{ $child['data']['name'] }}</span>
                </a>
            @endforeach
            @endif
            </div>
        </div>
    </div>
    @endforeach
@endif