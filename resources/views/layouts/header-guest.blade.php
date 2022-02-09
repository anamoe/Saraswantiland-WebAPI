<nav
        class="navbar navbar-expand-lg py-2 navbar-dark bg-primary {{ request()->is('tutor') ? '' : 'fixed-top' }} shadow">
        <div class="container" style="position: relative">
           
            <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#navbar-primary"
                aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                {{-- <img src="./assets/img/brand/blue.png"> --}}
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-lg-auto">
                   
                
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('narahubung') ? 'bg-white text-primary' : '' }}"
                            href="{{url('maps')}}">Narahubung</a>
                    </li>
                  
                        <!-- <li class="nav-item border rounded-sm">
                            <a class="nav-link {{ request()->is('masuk') || request()->is('daftar/*') ? 'bg-white text-primary' : '' }}"
                                href="{{url('login')}}">Masuk</a>
                        </li> -->
                   
                
                </ul>
            </div>
        </div>
    </nav>