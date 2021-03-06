@extends('layouts.app')

@section('content')
    <div class="col-md12" style="border-top: 1px #eee solid; border-radius: 4px; padding: 10px;">
        <div class="container">
            @if(!empty($item))
            <div class="col-md-5 col-md-offset-3" style="border: 1px #eee solid; padding: 10px" >
                <form action="{{ route('edit', $item->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="text" name="_token" value="{{ csrf_token()}}" hidden>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title" required value="{{ $item->title }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="description" required value="{{ $item->description }}">
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
            @endif
        </div>
    </div>

    </div>
@endsection