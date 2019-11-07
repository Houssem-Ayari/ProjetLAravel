@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">modifier</h1>

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
        <form method="post" action="{{ route('Order.update', $order->id) }}">
            @method('PATCH') 
            @csrf
           

           

            <div class="form-group">
                    <label for="id_item_menu">Description menu:</label>
                    <select name="id_item_menu" class="form-control">
                        @foreach ($ItemMenus as $item)
                    <option value="{{$item->id}}">{{$item->nom_item_menu}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                        <label for="id_utilisateur">Description menu:</label>
                        <select name="id_utilisateur" class="form-control">
                            @foreach ($utilisateur as $item)
                        <option value="{{$item->id}}">{{$item->nom_utilisateur}}</option>
                            @endforeach
                        </select>
                    </div>
           
            
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection