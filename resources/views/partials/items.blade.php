@extends('layouts.app')
@section('content')
    <hr>
<div class="col-md-12">
    @if(!empty($items) && isset($items))
    @foreach($items as $item)
    <div class="col-md-2" style="height: 200px; width: 20%;">
        <a href="show/{{ $item->id }}">
            <h4 style="font-weight: bold">{{ $item->title }}</h4>
        </a>
        <p style="word-wrap: break-word;">{{ $item->description }}</p>
        <span>{{ $item->user->name }}</span>
        <span>{{ $item->created_at }}</span>
        <div style="margin-top: 10px">
            @if($item->user->id == $userId)
            <a style="margin-right: 10px" class="btn btn-default" href="{{ route('edit', $item->id) }}" role="button">Edit</a>
            <a href="{{route('delete', $item->id)}}" class="btn btn-danger">Delete</a>
            @endif
        </div>
    </div>
    @endforeach
    @endif
    <div class="container">
        @include('partials.pagination')
    </div>
</div>
    <hr>
@endsection