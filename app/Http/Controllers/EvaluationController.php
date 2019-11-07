<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\ItemMenu;
use App\Utilisateur;

class EvaluationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eval=Evaluation::all();
        $itemmenus=ItemMenu::all();
        $utilisateurs=Utilisateur::all();
        
        return view('Evaluation.index',['eval'=>$eval, 'ItemMenus'=>$itemmenus,
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
        $eval= new Evaluation ([
            
            'note' => $request->get('note'),
            'id_utilisateur' => $request->get('id_utilisateur'),
            'id_item_menu' => $request->get('id_item_menu')
           
        ]);
        $eval->save();
        return redirect('/Evaluation')->with('success','itemmenu saved');
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
        $eval = Evaluation::find($id);
        return view('Evaluation.edit', ['ItemMenus'=>$itemmenu, 'eval'=>$eval,
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
        $eval = Evaluation::find($id);
        $eval->note = $request->get('note');
        $eval->id_utilisateur = $request->get('id_utilisateur');
        $eval->id_item_menu = $request->get('id_item_menu');
        
        $eval->save();

        return redirect('/Evaluation')->with('success', 'item menu modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eval = Evaluation::find($id);
        $eval->delete();

        return redirect('/Evaluation')->with('success', 'utilisateur supprimer!');
    }
}
