@extends('app')

@section('content')
    <div class="row about-me">
        <div class="col-lg-6 col-md-6 col-sm-12">
            {!! Html::image('images/me.png', 'me', array('class' => 'img-thumbnail')) !!}
            <div class="text-center contacts">
                <br />
                @include('_social')
            </div>
            @if (Session::get('locale') == 'ru')
                <p class="text-center lead about-me">{!! link_to_asset('files/CV.pdf', 'Резюме', ['_target' => 'blank']) !!}</p>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p class="lead text-justify">{!! Lang::get('frontend.about_me') !!}</p>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    {!! Lang::get('frontend.prof_skills') !!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4>{!! Lang::get('frontend.tech_skills') !!}</h4>
                    <ul>
                        <li>PHP, Laravel, Kohana</li>
                        <li>Ruby on Rails</li>
                        <li>Javascript, jQuery, CoffeeScript</li>
                        <li>CSS, SASS, LESS, HTML, Twitter Bootstrap</li>
                        <li>Linux, Apache, NGINX, GIT, SVN</li>
                        <li>MySQL, PostgreSQL, MongoDb, Redis</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@stop