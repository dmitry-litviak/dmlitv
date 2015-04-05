<div class="row home-images">
    @foreach($items as $item)
        <div class="col-xs-6 col-sm-4 col-md-2">
            <a href="{{ action('ItemsController@show', [$item->id]) }}" class="thumbnail">
                <img  alt="{{ $item->title }}"  src="{{ route('picture', 'items/' . $item->id . '/' . $item->image) }}"/>
            </a>
        </div>
    @endforeach
</div>