<nav class="navbar navbar-expand-lg classic transparent position-absolute navbar-dark">
    <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand w-100">

            <a href="#" class="mx-5 my-5">
                <img style="height: 30px; width: auto" class="logo-dark" src="{{ url('/sandbox/img/logo-bpssumsel.png') }}"
                    alt="" />
                <img style="height: 30px; width: auto" class="logo-light"
                    src="{{ url('/sandbox/img/logo-bpssumsel.png') }}" alt="" />
            </a>

            <a href="#" class="mx-5 my-5">
                <img style="height: 30px; width: auto" class="logo-dark"
                    src="{{ url('/zanex/images/brand/logo_pst.png') }}" alt="" />
                <img style="height: 30px; width: auto" class="logo-light"
                    src="{{ url('/zanex/images/brand/logo_pst_light.png') }}" alt="" />
            </a>
        </div>


        <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                @guest
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ url('login') }}" class="btn btn-sm btn-outline-green rounded-pill">Login</a>
                    </li>
                @endguest
                <li class="nav-item d-lg-none">
                    <button class="hamburger offcanvas-nav-btn"><span></span></button>
                </li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-collapse -->

        <!-- /.navbar-other -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->

<!-- /.offcanvas -->
