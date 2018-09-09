@extends('layouts.app')
@section('content')
    <hr>
<div class="col-md-12">
    @if(!empty($items))
    @foreach($items as $item)
    <div class="col-md-2" style="height: 200px; width: 20%;">
        <h4 style="font-weight: bold">{{ $item->title }}</h4>
        <p style="word-wrap: break-word;">{{ $item->description }}</p>
        <a style="position:absolute;bottom:0;" class="btn btn-default" href="#" role="button">More info &raquo;</a>
    </div>
    @endforeach
    @endif
    <div class="container">
        @include('partials.pagination')
    </div>
</div>
    <hr>
@endsection