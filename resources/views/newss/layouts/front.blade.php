<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('newss.elements.head')
</head>
<body>
<div class="container-fluid fh5co_header_bg">
    @php
        $time = Carbon\Carbon::now()->format('d-m-Y');
        $days = Carbon\Carbon::createFromFormat('d-m-Y',$time)->format('l');
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                            class="fa fa-clock-o" style="margin-right: 5px"></i>{{ $days . ' ' . $time }}</a>
            </div>
        </div>
    </div>
</div>
@include('newss.elements.nav_bar')
@yield('content')
@include('newss.elements.footer')

@include('newss.elements.script')
</body>
</html>
