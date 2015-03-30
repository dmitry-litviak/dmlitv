<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('en_description', 'English description:') !!}
    {!! Form::textarea('en_description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ru_description', 'Russian description:') !!}
    {!! Form::textarea('ru_description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>

<div class="form-group">
    {!! Form::label('technology_list', 'Technologies:') !!}
    {!! Form::select('technology_list[]', $technologies, null, ['id' => 'technology_list','class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_btn, ['class' => 'btn btn-primary pull-right']) !!}
</div>

@section('footer')
    <script>
        $('#technology_list').select2({
            'placeholder': 'Choose a technology'
        });
    </script>
@stop