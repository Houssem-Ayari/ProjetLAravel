<?php

namespace App\Http\Controllers\Api;
use App\ItemMenu;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemMenuController extends Controller
{
    public function index ()
    {
     //$menus =Menu::with('Produits')->get();
     $itemmenus =ItemMenu::all();

        return response()->json(['data'=>  $itemmenus], 200,[],JSON_NUMERIC_CHECK);
  
    }
}
