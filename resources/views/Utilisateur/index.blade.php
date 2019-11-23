@extends('welcome')

@section('content')
<div class="row">
       
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Ajouter un Utilisateur</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('Utilisateur.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nom_Utilisateur">nom utilisateur:</label>
              <input type="text" class="form-control" name="nom_Utilisateur"/>
          </div>

          <div class="form-group">
              <label for="prenom_Utilisateur">prenom Utililisateur:</label>
              <input type="text" class="form-control" name="prenom_Utilisateur"/>
          </div>

          <div class="form-group">
                <label for="adresse_Utilisateur">adresse Utilisateur:</label>
                <input type="text" class="form-control" name="adresse_Utilisateur"/>
            </div>

            <div class="form-group">
                    <label for="email_Utilisateur">email Utilisateur:</label>
                    <input type="email" class="form-control" name="email_Utilisateur"/>
                </div>

                <div class="form-group">
                        <label for="badge_Utilisateur">badge Utilisateur:</label>
                        <input type="text" class="form-control" name="badge_Utilisateur"/>
                    </div>
                    
          <button type="submit" class="btn btn-primary-outline">Ajouter Utilisateur</button>
      </form>
  </div>
</div>

<div class="col-sm-12">
        <h1 class="display-3">List Utilisateur</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>nom Utilisateur</td>
              <td>prenom Utilisateur</td>
              <td>adresse Utilisateur</td>
              <td>email Utilisateur</td>
              <td>badge Utilisateur</td>
              
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($Utilisateur as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nom_utilisateur}}</td>
                <td>{{$item->prenom_utilisateur}}</td>
                <td>{{$item->adresse_utilisateur}}</td>
                <td>{{$item->email_utilisateur}}</td>
                <td>{{$item->badge_utilisateur}}</td>
                
                <td>
                    <a href="{{ route('Utilisateur.edit',$item->id)}}" class="btn btn-primary">modifier</a>
                </td>
                <td>
                    <form action="{{ route('Utilisateur.destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>

</div>
@endsection