<?php namespace App\Providers;

use App\Item;
use App\Picture;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		Item::created(function($item)
		{
			$item->storeOneImage();
			$item->storeManyImages(Input::file('pictures'), 'App\Picture', 'name');
		});
	}

}
