<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;
use Illuminate\Http\Request;

class PagesController extends Controller {

    public function index() {
        return view('home', compact('items'));
    }

	public function about() {
        return view('about');
    }

}
