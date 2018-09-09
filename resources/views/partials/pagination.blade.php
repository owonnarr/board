<div class="container">
    <div class="col-md-6 col-md-offset-4">
        <ul class="pagination" style="margin-left: 60px;">
            @if($items)
            {{ $items->render() }}
            @endif
        </ul>
    </div>
</div>