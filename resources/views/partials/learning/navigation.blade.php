<!-- Header section -->
<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="site-logo">
                    <img src="/img/logo.png" alt="">
                </div>
                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">              
                
                <!-- Si es invitado  -->
                @guest 
                    <!-- Ventana Modal -->
                    <a href="#" id="login-button" class="site-btn header-btn">{{ __("Acceder") }}</a>
                    @include('partials.learning.modals.login')
                @else
                    <!-- Enlace de logout para cerra sesion -->
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                       class="site-btn header-btn"
                    >
                       {{ __("Salir") }}
                    </a>

                    <form  id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>                 
                @endguest 

                <nav class="main-menu">
                    <ul>
                        <li><a href="{{ route('welcome') }}">{{ __("Inicio") }}</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="courses.html">Courses</a></li>
                        <li><a href="blog.html">News</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header section end -->

@push("js")
    <script>
        // si existe la sesion error-login (falla la validacion o credencialies incorrectas)
        @if(session('error-login'))
            // mostramos la modal 
            $("#login-modal").modal();
        @endif
        // sino click a boton Acceder (login-button)
        jQuery("#login-button").on("click", function (e){
            e.preventDefault();
            // abrimos la ventana modal
            $("#login-modal").modal();
        })
    </script>

@endpush