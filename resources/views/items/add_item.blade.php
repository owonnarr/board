@extends('layouts.app')

@section('content')
    <div class="col-md12" style="border-top: 1px #eee solid; border-radius: 4px; padding: 10px;">
        <div class="container">

            <div class="col-md-5 col-md-offset-3" style="border: 1px #eee solid; padding: 10px" >
                <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                    <input type="text" name="_token" value="{{ csrf_token()}}" hidden>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title" required value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="description" required value="{{ old('description') }}">
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>

        </div>
    </div>

    </div>
@endsection