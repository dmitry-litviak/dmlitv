<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PicturesController extends Controller {

	public function get($filename) {
//        $entry = Picture::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($filename);

        return (new Response($file, 200))->header('Content-Type', 'jpg');
    }

}
