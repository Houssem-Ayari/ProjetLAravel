<?php

namespace App\Http\Controllers\Api;
use\App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function store(Request $request ) {

	$this->validate($request, [
        'id_user' => 'required',
        'id_item' => 'required'
    ]);

    $order = Order::create([
        'id_utilisateur' => request('id_user'),
        'id_item_menu' => request('id_user'),
    ]);

  }
    
}
