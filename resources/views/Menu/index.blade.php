@extends('welcome')

@section('content')
<div class="row">
        
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Ajouter une menu</h1>
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
      <form method="post" action="{{ route('Menu.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nom_menu">nom de menu:</label>
              <input type="text" class="form-control" name="nom_menu"/>
          </div>

          <div class="form-group">
              <label for="description_menu">Description menu:</label>
              <input type="text" class="form-control" name="description_menu"/>
          </div>
                    
          <button type="submit" class="btn btn-primary-outline">Ajouter menu</button>
      </form>
  </div>
</div>

<div class="col-sm-12">
        <h1 class="display-3">List Menu</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>nom menu</td>
              <td>description menu</td>
              
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($Menu as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nommenu}}</td>
                <td>{{$item->descriptionmenu}}</td>
                
                <td>
                    <a href="{{ route('Menu.edit',$item->id)}}" class="btn btn-primary">modifier</a>
                </td>
                <td>
                    <form action="{{ route('Menu.destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>

</div>
@endsection