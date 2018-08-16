<div class="sidebar">

    @if(Auth::check())
        @include('frontend.account.userpanel')
        @endif
</div>

@if(count($list_news))
<div class="sidebar border-left">
    <div class="blockTitle row lineHorizontal">
        <h3><span><i class="fa fa-newspaper-o"></i> Tin mới</span></h3>
    </div>
    <div class="blockContent row">
        <div class="content-side">
            @foreach($list_news as $post)
            <div class="fullImage small-blockitem">
                <div class="blockCase">
                    <div class="cover">
                        <a href="{{ url('tin-tuc').'/'.$post->url_key }}"><img src="http://127.0.0.1/laravelfull-nghia/public/assets/images/thumb.jpg" alt=""/></a>
                    </div>
                    <div class="heading">
                        <h3><a href="{{ url('tin-tuc').'/'.$post->url_key }}">{{ $post->title }}</a></h3>
                    </div><a href="{{ url('tin-tuc').'/'.$post->url_key }}" class="readmore">Xem thêm...</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif