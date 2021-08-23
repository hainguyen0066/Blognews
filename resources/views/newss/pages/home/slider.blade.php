@if(count($itemsSlider) > 0)
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach($itemsSlider as $slider)
                    <div class="item">
                        <h4>{{ $slider['description'] }}</h4>
                        <a title="{{ $slider['name'] }}" href="{{ $slider['link'] }}"><img src="/images/slider/{{ $slider['thumb'] }}" alt="{{ $slider['name'] }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .owl-carousel .item {
            position: relative;
        }
        .owl-carousel .item h4 {
            position: absolute;
            color: #00A6C7;
            top: 50%;
            left: 27%;
            transform: translate(-50%, -50%);
            max-width: 700px;
        }
    </style>
@endif
