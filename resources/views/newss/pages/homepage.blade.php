@extends('newss.layouts.front')
@section('title','Homepage')
@section('content')
    @include('newss.pages.home.slider')
    @include('newss.pages.home.trends_items', ['items' => $itemsFeatured, 'nameTitle' => 'Trendings'])
    @include('newss.pages.home.news_item', ['items' => $itemsLatest])
{{--    @include('newss.pages.home.video_items')--}}
    @include('newss.pages.home.news_list_items', ['itemsCategory' => $itemsCategory])
@endsection
