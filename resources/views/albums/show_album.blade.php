@extends('layouts.main_layout')


@section('title')
<title>Album</title>
@endsection


@section('content')
<form action="{{route('update_album')}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container">
        <h1>Editar Álbum</h1>

    <div class="mb3">
        <label for="photo" class="form-label">Foto</label>
        <input value="" name="photo" type="file" class="form-control" id="photo">
        <input type="hidden" name="id" value="{{$ourAlbum->photo}}">
    </div>

    <div class="mb3">
        <label for="name" class="form-label">Nome</label>
        <input value="{{$ourAlbum->name}}" name="nome" type="text" class="form-control" id="name">
    </div>

    <div class="mb3">
        <label for="name" class="form-label">Data de Lançamento</label>
        <input value="{{$ourAlbum->release_date}}" name="release_date" type="date" class="form-control" id="name">
    </div>

    <button class="btn btn-info" type="submit">Editar</button>
</div>
</form>

    {{-- <h1>Aqui podes adicionar users</h1> --}}
    <div class="container">
    <a href="{{route('home')}}"><li>Voltar</li></a>
    </div>

@endsection