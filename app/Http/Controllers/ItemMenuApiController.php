<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemMenu;

class ItemMenuApiController extends Controller
{
    public function index()
    {
        return response()->json(ItemMenu::all());
    }
 
    public function show($id)
    {
        return ItemMenu::find($id);
    }

    public function store(Request $request)
    {
        return ItemMenu::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $item = ItemMenu::findOrFail($id);
        $item->update($request->all());

        return $item;
    }

    public function delete(Request $request, $id)
    {
        $item = ItemMenu::findOrFail($id);
        $item->delete();

        return 204;
    }
}
