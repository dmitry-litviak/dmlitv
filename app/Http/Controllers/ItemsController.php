<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Technology;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ItemsController extends Controller {

    public function _construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']);
    }

	public function index()
    {
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function create()
    {
        return view('items.create', compact('technologies'));
    }

    public function store(ItemRequest $request)
    {
        dd($request->all());
        $this->createItem($request);

        Flash::success('Item successfully added');

        return redirect('/');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item', 'technologies'));
    }
    
    public function update(Item $item, ItemRequest $request)
    {
        $item->update($request->all());
        $this->syncTechnologies($item, $request->input('technology_list'));

        Flash::success('Item successfully updated');

        return redirect('/');
    }

    private function syncTechnologies(Item $item, array $technology_list)
    {
        $item->technologies()->sync($technology_list);
    }

    private function createItem(ItemRequest $request)
    {
        $item = Auth::user()->items()->create($request->all());
        $this->syncTechnologies($item, $request->input('technology_list'));
        return $item;
    }
}
