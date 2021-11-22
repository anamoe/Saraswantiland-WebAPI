<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">

        <a href="{{url('/')}}" class="logo">
            <img src="{{asset('public/icon/logo.png')}}" style="width:120px;" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
            <div class="collapse" id="search-nav">

            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">


                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{asset('public/profile/'.auth()->user()->foto_profil)}}"  alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>

                    
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                           
                            <li>
                                <a class="dropdown-item" href="{{url('profil')}}" onclick="event.preventDefault();
                                              document.getElementById('p').submit();">
                                    {{ __('Profil') }}
                                </a>

                                <form id="p" action="{{url('profil')}}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('logout')}}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{url('logout')}}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>