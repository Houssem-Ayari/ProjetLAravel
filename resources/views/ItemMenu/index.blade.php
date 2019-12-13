@extends('welcome')

@section('content')
<div class="row">
        
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Ajouter une item menu</h1>
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
      <form method="post" action="{{ route('ItemMenu.store') }}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">    
              <label for="nom_item_menu">nom de item menu:</label>
              <input type="text" class="form-control" name="nom_item_menu"/>
          </div>

          <div class="form-group">
              <label for="description_item_menu">Description menu:</label>
              <input type="text" class="form-control" name="description_item_menu"/>
          </div>


          <div class="form-group">
            <label for="prix_item_menu">Prix:</label>
            <input type="text" class="form-control" name="prix_item_menu"/>
        </div>
 
          <div class="form-group">
                <label for="description_item_menu">Description menu:</label>
                <select name=id_menu class="form-control">
                    @foreach ($Menus as $item)
                <option value="{{$item->id}}">{{$item->nommenu}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
              
              <input type="file" name="image" />

            </div>
                    
          <button type="submit" class="btn btn-primary-outline">Ajouter item menu</button>
      </form>
  </div>
</div>

<div class="col-sm-12">
        <h1 class="display-3">List item Menu</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>nom menu</td>
              <td>description menu</td>
              <td>prix</td>
              <td>image</td>
              <td>nom menu</td>
              
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($ItemMenu as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nom_item_menu}}</td>
                <td>{{$item->description_item_menu}}</td>
                <td>{{$item->prix}}</td>
                <td><img src="{{URL::to('/')}}/images/{{$item->image}}" class="img-thumbnail" width="75" /></td>
                <td>{{$item->id_menu}}</td>
                
                <td>
                    <a href="{{ route('ItemMenu.edit',$item->id)}}" class="btn btn-primary">modifier</a>
                </td>
                <td>
                    <form action="{{ route('ItemMenu.destroy', $item->id)}}" method="post">
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