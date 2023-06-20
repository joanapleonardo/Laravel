@extends('layouts.main_layout')


@section('title')
<title>Ver álbuns</title>
@endsection


@section('content')

<div class="container">
        <h1>Foto: {{ $ourAlbum->photo}}</h1>
        <h3>Nome:{{ $ourAlbum->name }}</h3>
        <h3>Descrição:{{ $ourAlbum->release_date}}</h3>
</div>

@endsection