<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemMenu;
use App\Menu;

class ItemMenuController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $itemmenu=ItemMenu::all();
        $menus=Menu::all();
        
        return view('ItemMenu.index',['ItemMenu'=>$itemmenu, 'Menus'=>$menus]);
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
        $request->validate(['image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $itemmenu= new ItemMenu ([
            
            'nom_item_menu' => $request->get('nom_item_menu'),
            'description_item_menu' => $request->get('description_item_menu'),
            'prix' => $request->get('prix_item_menu'),
            'image' => $new_name,
            'id_menu' => $request->get('id_menu'),
           
        ]);
        $itemmenu->save();
        return redirect('/ItemMenu')->with('success','itemmenu saved');
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
        $menus=Menu::all();
        $itemmenu = ItemMenu::find($id);
        return view('ItemMenu.edit', ['ItemMenu'=>$itemmenu, 'Menus'=>$menus]);
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

        $itemmenu = ItemMenu::find($id);
        
        
        
        if($request->hasFile('image')){
            
            $request->validate(['image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $image = $request->file('image');
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images'),$new_name);
            $itemmenu->image = $new_name;

        }
        
        $itemmenu->nom_item_menu = $request->get('nom_item_menu');
        $itemmenu->description_item_menu = $request->get('description_item_menu');
        //$itemmenu->prix=1;
        $itemmenu->id_menu = $request->get('id_menu');
        
        $itemmenu->save();

        return redirect('/ItemMenu')->with('success', 'item menu modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itememnu = ItemMenu::find($id);
        $itemmenu->delete();

        return redirect('/ItemMenu')->with('success', 'utilisateur supprimer!');
    }
}
