@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">modifier item menu</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('ItemMenu.update', $ItemMenu->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nom_item_menu">nom menu:</label>
                <input type="text" class="form-control" name="nom_item_menu" value={{ $ItemMenu->nom_item_menu }} />
            </div>

            <div class="form-group">
                <label for="description_item_menu">description menu:</label>
                <input type="text" class="form-control" name="description_item_menu" value={{ $ItemMenu->description_item_menu }} />
            </div>

            <div class="form-group">
                    <label for="id_menu">Description menu:</label>
                    <select name=id_menu class="form-control">
                        @foreach ($Menus as $item)
                    <option value="{{$item->id}}">{{$item->nommenu}}</option>
                        @endforeach
                    </select>
                </div>

           
            
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection