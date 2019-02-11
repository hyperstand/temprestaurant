@extends('skeleton')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
{{ Html::style('css/linearicons.css') }}
{{ Html::style('css/owl.carousel.css') }}
{{ Html::style('css/font-awesome.min.css') }}	
{{ Html::style('css/nice-select.css') }}		
{{ Html::style('css/magnific-popup.css') }}
{{ Html::style('css/bootstrap.css') }}
{{ Html::style('css/main.css') }}
{{ Html::style('css/booking.css') }}
{{ Html::style('css/loading.css') }}
@endsection



@section('component') 
@include('component.ifloginnav')
@include('layouts.deliverycart')
{{-- @include('layouts.deliveryprogress') --}}
@endsection


@section('javascript')
{{ Html::script('js/vendor/jquery-2.2.4.min.js') }}
{{ Html::script('js/vendor/angularjs-1.7.5.min.js') }}
{{ Html::script('js/vendor/popper.1.12.9.min.js') }}
{{ Html::script('js/vendor/bootstrap.min.js') }}
{{ Html::script('js/vendor/mapbox-gl.52.0.js') }}
{{ Html::script('js/superfish.min.js') }}
{{ Html::script('js/jquery.magnific-popup.min.js') }}
{{ Html::script('js/owl.carousel.min.js') }}
{{ Html::script('js/main.js') }}
{{ Html::script('js/app.js') }}		
@endsection