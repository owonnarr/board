<div class="container">
    <div style="height: 60px" class="col-md-12">
        <div style="padding: 30px; margin-left: 440px;">
            <a style="font-size: 18px" href="{{ route('create') }}" class="btn btn-success">Create Ad</a>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-4">
        <ul class="pagination" style="margin-left: 60px;">
            @if($items)
            {{ $items->render() }}
            @endif
        </ul>
    </div>
</div>