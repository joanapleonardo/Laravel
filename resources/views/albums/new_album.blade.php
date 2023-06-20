@extends('layouts.main_layout')



@section('title')
    <title>Adicionar Álbum</title>
@endsection



@section('content')
<div class="container">

    <form method="POST" action="{{ route('create_album') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPhoto" class="form-label">Foto</label>
            <input value="" name="photo" type="file" accept="images/*" class="form-control" id="photo">

        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nome</label>
            <input name="name" type="text" value="" class="form-control" id="exampleInputName">
            @error('name')
                <div id="nameHelp" class="form-text">Insira o nome do álbum.</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputReleaseDate" class="form-label">Data de Lançamento</label>
            <input name="release_date" type="date" value="" class="form-control" id="exampleInputDescription1">
            @error('release_date')
                <div id="nameHelp" class="form-text">Insira data de lançamento do álbum.</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Banda</label>
            <select class="custom-select" name="band_id">
                <option value="" selected>Todas as bandas</option>
                @foreach ($allBands as $item)
                    <option @if ($item->id == request()->query('band_id')) selected @endif value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>

            @error('band_id')
                <div id="nameHelp" class="form-text">Seleccione uma.</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<a href="{{route('home')}}"><li>Voltar</li></a>

@endsection
