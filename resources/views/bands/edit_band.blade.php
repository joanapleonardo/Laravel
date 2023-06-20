@extends('layouts.main_layout')


@section('title')
<title>Banda</title>
@endsection


@section('content')
<form action="{{route('update_band')}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container">
        <h1>Editar Banda</h1>

    <div class="mb3">
        <label for="photo" class="form-label">Foto</label>
        <input value="" name="photo" type="file" class="form-control" id="photo">
        <input type="hidden" name="id" value="{{$ourBand->id}}">
    </div>

    <div class="mb3">
        <label for="name" class="form-label">Nome</label>
        <input value="{{$ourBand->name}}" name="nome" type="text" class="form-control" id="name">
    </div>

    <button type="submit">Editar</button>
</div>
</form>
@endsection