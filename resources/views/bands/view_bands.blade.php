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
        <th scope="col">Nome da Banda</th>
        <th scope="col">Nº de Álbums</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allBands as $item)
      <tr>
          <td><img width="30px" height="30px"
            src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('images/nophoto.jpg') }}"
            alt=""></td>
          <td>{{$item->name}}</td>
          <td>{{$item->num}}</td>
          <td>
            <a href="{{ route('show_band', $item->id)}}"> <button class="btn btn-info">Ver Álbuns</button> 
              @Auth
            <a href="{{ route('edit_band', $item->id)}}"> <button class="btn btn-success">Editar</button>   
              @if (Auth::user()->user_type == User::userAdmin)          
            <a href="{{ route('delete_band', $item->id)}}"> <button class="btn btn-danger">Apagar</button> 
              @endif
              @endAuth
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection