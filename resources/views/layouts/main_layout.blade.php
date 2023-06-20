

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @section('title')
    <title>Main Layout</title>

    <!--css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
   <!-- As a link -->
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="nav-link" href="{{route('home')}}">Projecto Final Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('show_all_bands')}}">Bandas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('show_all_albums')}}">Álbuns</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">BackOffice</a>
              </li>
              @endauth
        </ul>
      </div>
    </div>
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        @auth
            <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"></a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif
  </nav>

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
      @yield('content')

      {{-- <h1>FIM do ficheiro</h1> --}}

      @yield('endcontent')

<footer>


</footer>


</body>
</html>