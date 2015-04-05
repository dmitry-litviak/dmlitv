@extends('app')

@section('content')

    <div class="row about-me">
        <div class="col-sm-12 col-md-8 col-lg-8">
            @foreach($item->pictures as $picture)
                <img class="img-thumbnail gallery-item" src="{{ route('picture', "items/{$item->id}/{$picture->name}") }}" />
            @endforeach
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <h2>{{ $item->title }}</h2>
            <a href="{{ $item->link }}">{{ $item->link }}</a><br/>

            <div class="description">
                @if (Session::get('locale') == 'en')
                    {!! $item->en_description !!}
                @else
                    {!! $item->ru_description !!}
                @endif
            </div>

            <p class="lead">
                @foreach($item->technologies as $technology)
                        <span class="label label-info">{{ $technology->name }}</span>
                @endforeach
            </p>
        </div>
    </div>

@stop