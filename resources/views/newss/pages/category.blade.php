@extends('newss.layouts.front')
@section('title','Danh Mục')
@section('content')
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    @include('newss.partials.item_in_category_lists', ['items' => $itemsCategory['articles']])
                </div>
                <div class="col-md-3 animate-box fadeInRight animated-fast" data-animate-effect="fadeInRight">
                    @include('newss.partials.tags')
                    @include('newss.partials.most_popular')
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center pb-4 pt-4">
                    {{ $itemsCategory['articles']->links('pagination.pagination_fe') }}
                </div>
            </div>
        </div>
    </div>
@endsection
