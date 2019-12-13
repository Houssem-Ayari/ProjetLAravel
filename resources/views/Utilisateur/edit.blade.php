@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">modifier Utilisateur</h1>
        
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
        
        <form method="post" action="{{ route('Utilisateur.update', $Utilisateur->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nom_Utilisateur">nom Utilisateur:</label>
                <input type="text" class="form-control" name="nom_Utilisateur" value={{ $Utilisateur->nom_utilisateur }} />
            </div>

            <div class="form-group">

                    <label for="prenom_Utilisateur">prenom Utilisateur:</label>
                    <input type="text" class="form-control" name="prenom_Utilisateur" value={{ $Utilisateur->prenom_utilisateur }} />
                </div>

            <div class="form-group">
                <label for="adresse_Utilisateur">adresse Utilisateur:</label>
                <input type="text" class="form-control" name="adresse_Utilisateur" value={{ $Utilisateur->adresse_utilisateur }} />
            </div>

            <div class="form-group">
                    <label for="email_Utilisateur">email Utilisateur:</label>
                    <input type="email" class="form-control" name="email_Utilisateur" value={{ $Utilisateur->email_utilisateur }} />
                </div>

                <div class="form-group">
                        <label for="badge_Utilisateur">badge Utilisateur:</label>
                        <input type="text" class="form-control" name="badge_Utilisateur" value={{ $Utilisateur->badge_utilisateur }} />
                    </div>
           
            
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>

@endsection