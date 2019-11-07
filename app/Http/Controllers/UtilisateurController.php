<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class UtilisateurController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $utilisateur=Utilisateur::all();
        
        return view('Utilisateur.index',['Utilisateur'=>$utilisateur]);
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
        $utilisateur= new Utilisateur ([
            
            'nom_utilisateur' => $request->get('nom_Utilisateur'),
            'prenom_utilisateur' => $request->get('prenom_Utilisateur'),
            'adresse_utilisateur' => $request->get('adresse_Utilisateur'),
            'email_utilisateur' => $request->get('email_Utilisateur'),
            'badge_utilisateur'=> $request->get('badge_Utilisateur')
        ]);
        $utilisateur->save();
        return redirect('/Utilisateur')->with('success','menu saved');
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
        $utilisateur = Utilisateur::find($id);
        return view('Utilisateur.edit', ['Utilisateur'=>$utilisateur]);
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
        $utilisateur = Utilisateur::find($id);
        $utilisateur->nom_utilisateur = $request->get('nom_utilisateur');
        $utilisateuer->prenom_utilisateur = $request->get('prenom_utilisateur');
        $utilisateur->adresse_utilisateur = $request->get('adresse_utilisateur');
        $utilisateur->email_utilisateur = $request->get('email_utilisateur');
        $utilisateur->badge_utilisateur = $request->get('badge_utilisateur');
        $utilisateur->save();

        return redirect('/Utilisateur')->with('success', 'utilisateur modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);
        $utilisateur->delete();

        return redirect('/Utilisateur')->with('success', 'utilisateur supprimer!');
    }
}
