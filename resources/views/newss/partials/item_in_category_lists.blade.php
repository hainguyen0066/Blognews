@if(count($items) > 0)
    @foreach($items as $item)
        <div class="row pb-4">
            <div class="col-md-5">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="/images/article/{{ $item['thumb'] }}" alt="{{ $item['name'] }}"/></div>
                    <div></div>
                </div>
            </div>
            <div class="col-md-7">
                <a href="{{ \App\Helpers\URL::linkArticle($item['id'], $item['name']) }}" class="fh5co_magna py-2">{{ $item['name'] }}</a> <span href="#" class="fh5co_mini_time py-3">
            {{ $item['created_by'] }} -
                {{ \App\Helpers\FormatTime::timeToDate($item['created']) }}</span>
                <div class="fh5co_consectetur"> {!! Illuminate\Support\Str::limit($item['content'], 300) !!}
                </div>
            </div>
        </div>
    @endforeach

@endif
