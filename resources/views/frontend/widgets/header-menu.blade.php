<span class="navi-wrapper">
                    <div class="navigation">
                        <ul>
                            @foreach($menu as $item)
                            <li>
                                <a href="{{ $item['data']['url'] }}">{{ $item['data']['name'] }}</a>

                                @if($item['data']['children_count'] > 0)
                                    <ul>
                                        @foreach($item['childs'] as $child)
                                    <li>
                                        <a href="{{$child['data']['url']}}">{{$child['data']['name']}}</a>
                                    </li>
                                            @endforeach
                                </ul>
                                @endif
                            </li>

                            @endforeach
                        </ul>
</div>
</span>
