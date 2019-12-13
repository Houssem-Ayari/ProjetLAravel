<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\ItemMenu;

class MenuApiController extends Controller
{
    public function index(){
        
        $menu = Menu::with('ItemMenus')->get();
        
        return response()->json($menu);
    }
}
