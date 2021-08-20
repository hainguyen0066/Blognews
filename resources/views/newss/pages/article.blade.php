@extends('newss.layouts.front')
@section('title','Danh Mục')
@section('content')
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <img style="width: 400px; margin-bottom: 50px" src="/images/article/{{ $itemArticle['thumb'] }}" alt="{{ $itemArticle['name'] }}">
            <div class="row mx-0">
               {!! $itemArticle['content'] !!}
            </div>
        </div>
    </div>
    @include('newss.pages.home.trends_items', ['items' => $itemsLatest,  'nameTitle' => 'Artile Related'])
@endsection
