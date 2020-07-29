<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;

class ItemsController extends Controller
{
    public function create()
    {
        return view('item.form');
    }

    public function store(Request $request)
    {
        $a = $request;
        // dd($a->all());
        unset($a["_token"]);
        $new_item = ItemModel::save($a->all());

        return redirect('/items');
    }

    public function index()
    {
        $item = ItemModel::get_all();
        return view('index', compact('item'));
        dd($item->all());
    }
    public function show($id)
    {
        $item = ItemModel::find_by_id($id);
        return view('item.show', compact('item'));
    }

    public function update($id, Request $request)
    {
        $item = ItemModel::update($id, $request->all());
        return redirect('/items');
        // return view('item.edit', compact('item'));
    }
    public function destroy($id)
    {
        $delet = ItemModel::destroy($id);
        return redirect('/items');
    }
}
