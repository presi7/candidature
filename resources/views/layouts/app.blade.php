<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEFAR SCI Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style="background-color: #F3F2EF">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light shadow p-0  justify-content-center" style="background-color:#85abbd">
            <div class="container d-flex justify-content-between p-0">
                @if (auth()->check())
               <img  height="50" src="{{ asset("images/logo1.png")}}" alt="Le logo de defarsci">
                  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav justify-content-center">
                      <li class="nav-item">
                        <a class="nav-link text-white fw-bold" aria-current="page" href="/">Candidature</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white fw-bold" aria-current="page" href="/liste/candidat">Tableau de bord</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white fw-bold" aria-current="page" href="/liste/module">Liste Module</a>
                      </li>
                    </ul>
                  </div>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="btn text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> <!-- Icône de déconnexion -->
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </li>
                  </ul>
                @endif

              </div>
        </nav>
    </div>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
