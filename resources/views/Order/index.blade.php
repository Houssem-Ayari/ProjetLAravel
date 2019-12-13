@extends('welcome')

@section('content')
<div class="row">
     
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Ajouter ordre</h1>
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
      <form method="post" action="{{ route('Order.store') }}">
          @csrf
         

          <div class="form-group">
                <label for="id_utilisateur">Description menu:</label>
                <select name="id_utilisateur" class="form-control">
                    @foreach ($Utilisateur as $item1)
                <option value="{{$item1->id}}">{{$item1->nom_utilisateur}}</option>
                    @endforeach
                </select>
            </div>

          <div class="form-group">
                <label for="id_item_menu">Description menu:</label>
                <select name=id_item_menu class="form-control">
                    @foreach ($ItemMenus as $item)
                <option value="{{$item->id}}">{{$item->nom_item_menu}}</option>
                    @endforeach
                </select>
            </div>

            
                    
          <button type="submit" class="btn btn-primary-outline">Ajouter</button>
      </form>
  </div>
</div>

<div class="col-sm-12">
        <h1 class="display-3">List item Menu</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              
              <td>id item menu</td>
              <td>id utilisateur</td>
              
              
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <?php var_dump($order) ; ?> 
        <tbody>
          
            @foreach($order as $item)
            <tr>
                <td>{{$item->id}}</td>
                 
                <td>{{$item->id_item_menu}}</td>
                <td>{{$item->id_utilisateur}}</td>
               
                <td>
                    <a href="{{ route('Order.edit',$item->id)}}" class="btn btn-primary">modifier</a>
                </td>
                <td>
                    <form action="{{ route('Order.destroy', $item->id)}}" method="post">
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