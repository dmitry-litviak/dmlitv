<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Locale {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!Session::has('locale'))
		{
			Session::put('locale', $this->detectBrowserLocale());
		}

		app()->setLocale(Session::get('locale'));

		return $next($request);
	}

	private function detectBrowserLocale() {
		if(!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
			return Config::get('app.locale');
		$accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$lang = !empty($accept_language) ? strtok(strip_tags($accept_language), ',') : '';
		$lang = substr($lang, 0,2);
		return $lang;
	}

}
