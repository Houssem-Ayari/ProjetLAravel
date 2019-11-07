<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ItemMenu;
use App\Utilisateur;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order=Order::all();
        $itemmenus=ItemMenu::all();
        $utilisateurs=Utilisateur::all();
        
        return view('Order.index',['order'=>$order, 'ItemMenus'=>$itemmenus,
        'Utilisateur'=>$utilisateurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order= new Order ([
            
            
            'id_utilisateur' => $request->get('id_utilisateur'),
            'id_item_menu' => $request->get('id_item_menu')
           
        ]);
        $order->save();
        return redirect('/Order')->with('success','ordre saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemmenu=ItemMenu::all();
        $utilisateur=Utilisateur::all();
        $order = Order::find($id);
        return view('Order.edit', ['ItemMenus'=>$itemmenu, 'order'=>$order,
        'utilisateur'=>$utilisateur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        
        $order->id_utilisateur = $request->get('id_utilisateur');
        $order->id_item_menu = $request->get('id_item_menu');
        
        $order->save();

        return redirect('/Order')->with('success', 'ordre modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/Order')->with('success', 'ordre supprimer!');
    }
}
