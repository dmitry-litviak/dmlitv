@extends('app')

@section('content')

    @include('errors.form')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <legend class="text-center">Create new portfolio item</legend>
            {!! Form::open(['url' => 'items', 'files' => true]) !!}
            @include('items.partials._form', ['submit_btn' => 'Add Item'])
            {!! Form::close() !!}
        </div>
    </div>
    <br/>
@stop