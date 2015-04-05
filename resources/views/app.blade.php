<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Dmitry Litviak</title>

	{{--<link href="{{ asset('/css/vendor.css') }}" rel="stylesheet">--}}
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container">

		@include('flash::message')

		<div class="row">
			<div class="col-md-12">
				<a class="pull-right" id="menu-link" href="#sidr"><i id="menu-icon" class="fa fa-bars fa-5x"></i></a>
				<span class="pull-right" id="language-blok">
					{!! link_to('locale/set/en', 'EN', ['data-lang'=>'en', 'class' => 'language-switch ' . active_language('en')]) !!}
					{!! link_to('locale/set/ru', 'RU', ['data-lang'=>'ru', 'class' =>'language-switch '  . active_language('ru')]) !!}
				</span>
				<a href="{{ url('/') }}">{!! Html::image('images/logo.png', 'logo', array('class' => 'brand-name')) !!}</a>
			</div>
		</div>

		@yield('content')
	</div>

	@include('_menu')

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
	<script src="{{ elixir('js/app.js') }}"></script>

	@yield('footer')
</body>
</html>
