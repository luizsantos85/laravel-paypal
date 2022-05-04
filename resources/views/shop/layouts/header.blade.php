<nav class="navbar navbar-expand-lg navbar-dark menu">
    <div class="container-fluid container">
        <a  href="{{route('home')}}">
            <img class="logomarca" src="{{ asset('assets/img/Logomarca.png')}}" alt="LHSCODE">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
                {{-- <li class="nav-item">
                    <a class="nav-link {{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}">Home</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{request()->is('cart') ? 'active' : ''}}" href="{{route('cart')}}">Meu carrinho
                        <i class="bi bi-cart-fill"></i>
                        <span class="badge rounded-pill bg-secondary">
                            @if (Session::has('cart'))
                            {{Session::get('cart')->totalItems()}}
                            @else
                            0
                            @endif
                        </span>
                    </a>
                </li>

                @auth
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Name User
                    </a>
                    <ul class="dropdown-menu menu " aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('profile')}}">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Alterar senha</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{request()->is('login') ? 'active' : ''}}" href="{{route('login')}}">Logar</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>