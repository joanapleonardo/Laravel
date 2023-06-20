@extends('layouts.main_layout')

@section('title')
    <title>Adicionar Banda</title>
@endsection

@section('content')
<div class="container">

    <form method="POST" action="{{ route('create_band') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Foto</label>
            <input value="" name="photo" type="file" accept="images/*" class="form-control" id="photo">
            <input type="hidden" name="id" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputDescription1" class="form-label">Nome</label>
            <input name="name" type="text" value="" class="form-control" id="exampleInputDescription1"
                aria-describedby="descriptionHelp">
                
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>

       
    </form>
</div>  

@endsection