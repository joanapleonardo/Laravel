@php
    use App\Models\User;
@endphp

@extends('layouts.main_layout')


@section('title')
<title>Bandas</title>
@endsection


@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Nome</th>
        <th scope="col">Data de Lançamento</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ourAlbum as $item)
      <tr>
          <td><img width="80px" height="80px" src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('images/nophoto.jpg') }}" alt=""></td>
          <td>{{$item->name}}</td>
          <td>{{$item->release_date}}</td>
          <td>
            @Auth
              <a href="{{ route('show_album', $item->id)}}"> <button class="btn btn-info">Editar</button> 
                @if (Auth::user()->user_type == User::userAdmin)
              <a href="{{ route('delete_album', $item->id)}}"><button class="btn btn-danger">Delete</button>
                @endif
            @endAuth
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection