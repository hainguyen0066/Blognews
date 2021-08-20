<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    @foreach($itemsCategory as $category)
                    @if(!empty($category['articles']) && count($category['articles']))
                        <div class="post-in-category">
                                <div>
                                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $category['name'] }}</div>
                                    @include('newss.partials.item_in_category_lists', ['items' => $category['articles']])
                                </div>
                            </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                @include('newss.partials.tags')
                @include('newss.partials.most_popular')
            </div>
        </div>
    </div>
</div>
