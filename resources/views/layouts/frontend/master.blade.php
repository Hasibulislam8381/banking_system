<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <title>Bank System</title>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
         
          <a class="navbar-brand" href="{{ route('show') }}">Banking system</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="{{ route('show') }}">Home</a>
              <a class="nav-link" href="{{ route("createDeposite") }}">Deposite</a>
              <a class="nav-link" href="{{ route("deposite.view") }}">View Deposite</a>
              <a class="nav-link" href="#">Pricing</a>
              @auth <!-- Check if the user is authenticated -->
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            @endauth
            </div>
          </div>
        </div>
       
      </nav>
    
      @yield('content')
      @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>