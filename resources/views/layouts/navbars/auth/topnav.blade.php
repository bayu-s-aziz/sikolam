<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl id=" navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-4 px-3">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav  justify-content-start">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center " hidden="true">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                        </a>
                    </form>
                </li>
                <nav aria-label="breadcrumb">
                    <h5 class="mt-2 mx-1">{{ $title }}</h5>
                </nav>
            </ul>

        </div>
    </div>

</nav>
<!-- End Navbar -->