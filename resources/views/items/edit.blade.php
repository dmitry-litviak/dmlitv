@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <legend>Edit portfolio item</legend>
            {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id]]) !!}
            @include('items.partials._form', ['submit_btn' => 'Edit Item'])
            {!! Form::close() !!}
        </div>
    </div>

@include('errors.form')

@stop