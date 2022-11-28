
<nav class="navbar navbar-expand-lg navbar-bg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand nav-link" href="{{route('homepage')}}"><img src="/media/aulab_post_logo.png" class="logo" alt="">&nbsp&nbspHome</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::user() && (!Auth::user()->is_admin && !Auth::user()->is_revisor && !Auth::user()->is_writer))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('work.with.us')}}">Lavora con noi</a>
                </li>
                @endif
                @if (Auth::user() && Auth::user()->is_admin)
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                @elseif (Auth::user() && Auth::user()->is_revisor)
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('revisor.dashboard')}}">Dashboard</a>
                </li>
                @elseif (Auth::user() && Auth::user()->is_writer)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('articles.create')}}">Pubblica Articolo</a>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.dashboard')}}">I miei articoli</a>
                    
                </li>
                @endif
                
            </ul>
            <x-research />
            @guest 
            <ul class="navbar-nav mb-2 mb-lg-0">

               <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle mx-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto, ospite
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                     <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                  </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav mb-2 mb-lg-0">

               <li class="nav-item dropdown mx-auto">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto, {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     
                     <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Esci</a></li>
                     <form id ="form-logout" method="POST"action="{{route('logout')}}" class="d-none">@csrf</form>
                  </ul>
                </li>
            </ul>
            @endguest
            

        </div>
    </div>
</nav>