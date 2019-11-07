@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">modifier menu</h1>

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
        <form method="post" action="{{ route('Menu.update', $Menu->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nom_menu">nom menu:</label>
                <input type="text" class="form-control" name="nom_menu" value={{ $Menu->nommenu }} />
            </div>

            <div class="form-group">
                <label for="description_menu">description menu:</label>
                <input type="text" class="form-control" name="description_menu" value={{ $Menu->descriptionmenu }} />
            </div>

           
            
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection