<?php namespace App\Providers;

use App\Item;
use App\Technology;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('items.partials._form', function($view){
			$view->with('technologies', Technology::lists('name', 'id'));
		});

		view()->composer('items.partials._items', function($view){
			$view->with('items', Item::all());
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
