<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/zanex/images/brand/logo_pst_light.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_icon_pst_light.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_icon_pst.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_pst.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('/') }}"><i
                            class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Landing
                            Page</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('/home') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>Chatbot</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="{{ url('chatbot') }}"><i
                            class="side-menu__icon fe fe-message-circle"></i><span
                            class="side-menu__label">Chatbot</span></a>
                </li>
               

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon icon icon-organization"></i><span class="side-menu__label">Setting
                            Chatbot</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Setting
                            Chatbot</a></li>
                        <li><a href="{{ url('') }}" class="slide-item"> Data Publikasi</a></li>
                        <li><a href="{{ url('') }}" class="slide-item"> Data Table</a></li>
                        <li><a href="{{ url('') }}" class="slide-item"> AIML</a></li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Konsultasi</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon fe fe-video"></i><span class="side-menu__label">Konsultasi
                            Virtual</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Konsultasi Virtual</a></li>
                        <li><a href="{{ url('/konsultasi') }}" class="slide-item"> Mulai Konsultasi</a></li>
                        <li><a href="{{ url('/jadwal_konsultasi') }}" class="slide-item"> Jadwal Konsultasi</a></li>
                        <li><a href="{{ url('/zoom') }}" class="slide-item"> Zoom</a></li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Users Management</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">User
                            Management</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Users</a></li>
                        {{-- <li><a href="{{ url('/permissions') }}" class="slide-item"> Permissions</a></li> --}}
                        <li><a href="{{ url('/roles') }}" class="slide-item"> Roles</a></li>
                        <li><a href="{{ url('/users') }}" class="slide-item"> Users</a></li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Multimedia</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="widgets.html"><i
                            class="side-menu__icon icon icon-control-play"></i><span
                            class="side-menu__label">Multimedia</span></a>
                </li>

                <li class="sub-category">
                    <h3>Settings</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="widgets.html"><i
                            class="side-menu__icon fe fe-settings"></i><span
                            class="side-menu__label">Setting</span></a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
