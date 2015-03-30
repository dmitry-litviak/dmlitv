<?php namespace App\Providers;

use App\Item;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
			$filename = str_random() . '.' . $item->image->getClientOriginalExtension();
			$filepath = "items/" .$item->id . "/" . $filename;
			Storage::disk('local')->put($filepath, File::get($item->image));
			$item->image = $filename;
			$item->save();
		});
	}

}
