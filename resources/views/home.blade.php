@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-11 col-md-offset-1 greetings-block">
			<h2 class="greetings">
				{!! Lang::get('frontend.main_text', ['years' => \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate('1991'))]); !!}
			</h2>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-11 col-md-offset-1 contacts">
			@include('_social')
		</div>
	</div>
	@include('items.partials._items')


@endsection
