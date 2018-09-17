@extends('layouts.app')
@section('content')
    @if(isset($item) && $item !== null)
    <div class="col-md-5 col-md-offset-3">
        <div class="card-columns" style="border: 1px #eee solid; padding-left: 20px; padding-right: 20px; padding-bottom: 30px;">
            <h3 class="card-title">{{ $item->title }}</h3>
            <p class="card-text">{{ $item->description }}</p>
            <span class="text-warning">{{ $item->user->name }}</span>
            <span class="text-info">{{ $item->created_at }}</span>
        </div>
        <div style="margin-top: 10px">
            @if($item->user->id == $userId)
                <a style="margin-right: 10px" class="btn btn-default" href="{{ route('edit', $item->id) }}" role="button">Edit</a>
                <a href="{{route('delete', $item->id)}}" class="btn btn-danger">Delete</a>
            @endif
        </div>
    </div>
    @endif
@endsection