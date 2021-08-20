<div>
    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
</div>
@if(!empty(\App\Helpers\GetShareData::getArticleLasted(4)))
    @foreach(\App\Helpers\GetShareData::getArticleLasted(4) as $item)
        <div class="row pb-3">
                <div class="col-5 align-self-center">
                    <img src="/images/article/{{ $item['thumb'] }}" alt="{{ $item['name'] }}" class="fh5co_most_trading"/>
                </div>
                <div class="col-7 paddding">
                    <a href="{{ \App\Helpers\URL::linkArticle($item['id'], $item['name']) }}">
                    <div class="most_fh5co_treding_font">{{ $item['name'] }}</div>
                    <div class="most_fh5co_treding_font_123">{{ \App\Helpers\FormatTime::timeToDate($item['created']) }}</div>
                    </a>
                </div>
        </div>
    @endforeach
@endif

