@if(!empty($items))
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $nameTitle }}</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach($items as $article)
                    @php
                        $name         = $article['name'];
                        $thumb        = asset('images/article/' . $article['thumb']);
                        $datePublishPost = \App\Helpers\FormatTime::timeToDate($article['created'])
                    @endphp
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="{{ $thumb }}" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{ route('article/index', [
                                'article_id'   => $article['id'],
                                'article_name' => Str::slug($article['name'])
                                ]) }}" class="text-white">{{ $article['name'] }} </a>
                                <div class="fh5co_latest_trading_date_and_name_color"> {{ $article['created_by'] }} - {{ $datePublishPost }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endif
