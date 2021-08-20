<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
           @foreach($items as $item)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="/images/article/{{ $item['thumb'] }}" alt="{{ $item['name'] }}"/></div>
                        <div>
                            <a href="{{ \App\Helpers\URL::linkArticle($item['id'], $item['name']) }}" class="d-block fh5co_small_post_heading"><span class="">{{ $item['name'] }}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i>{{ \App\Helpers\FormatTime::timeToDate($item['created']) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
