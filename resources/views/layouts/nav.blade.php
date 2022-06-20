<nav class="navbar navbar-expand navbar-theme" style="background:#283559 ">
    <a id="toggle" class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>
    <a class="sidebar-brand " id="titulo2" href="{{route('dashboard')}}">
               EXOGAMES
               
            </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown ml-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-item">{{auth()->user()->email}}</div>
                    <form method="POST" action="{{route('logout')}}">
                        {{csrf_field()}}
                        <button class="dropdown-item" type="submit"><i class="align-middle mr-1 fas fa-sign-out-alt"></i> Cerrar Sesión</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>

</nav>