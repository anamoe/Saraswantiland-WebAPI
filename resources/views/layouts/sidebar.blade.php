<div class="sidebar  sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-primary">



                <li class="nav-item active">
                    <a data-toggle="collapse" href="#pp" class="collapsed" aria-expanded="false">

                        <img class="" src="{{asset('public/icon/rumah.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                        <span class="ml-3 item-text">Profil Perusahaan</span>

                        <span class="caret"></span>
                    </a>


                    <div class="collapse" id="pp">

                    
                  

                        <ul class="nav nav-collapse">

                        <li class="{{ (request()->is('beranda')) ? 'active' : '' }}">
                                <a href="{{url('/beranda')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/produk.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Beranda Apps</span>

                                </a>
                            </li>
                            
                            <li class="{{ (request()->is('ikhtisar')) ? 'active' : '' }}">
                                <a href="{{url('/ikhtisar')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/ikhtisar.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Ikhtisar Perusahaan</span>

                                </a>
                            </li>


                            <li class="{{ (request()->is('produk')) ? 'active' : '' }}">
                                <a href="{{url('/produk')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/produk.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Produk Perusahaan</span>

                                </a>
                            </li>
                        </ul>
                    </div>


                </li>


                <li class="nav-item active">
                    <a data-toggle="collapse" href="#ap" class="collapsed" aria-expanded="false">

                        <img class="" src="{{asset('public/icon/pemasaran.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                        <span class="ml-3 item-text">Alat Pemasaran</span>

                        <span class="caret"></span>
                    </a>

                    <div class="collapse" id="ap">

                        <ul class="nav nav-collapse">
                            <li class="{{ (request()->is('promo')) ? 'active' : '' }}">
                                <a href="{{url('/promo')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/promo.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Promo</span>

                                </a>
                            </li>


                            <li class="{{ (request()->is('lantai')) ? 'active' : '' }}">
                                <a href="{{url('/lantai')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/tipeunit.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Tipe Unit</span>

                                </a>
                            </li>



                            <li class="{{ (request()->is('filosofi')) ? 'active' : '' }}">
                                <a href="{{url('/filosofi')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/filosofi.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Filosofi</span>

                                </a>
                            </li>


                            <li class="{{ (request()->is('tagline')) ? 'active' : '' }}">
                                <a href="{{url('/tagline')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/tagline.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Tagline</span>

                                </a>
                            </li>

                            <li class="{{ (request()->is('contact')) ? 'active' : '' }}">
                                <a href="{{url('/contact')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/telp.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Contact</span>

                                </a>
                            </li>

                            <li class="{{ (request()->is('gedung')) ? 'active' : '' }}">
                                <a href="{{url('/gedung')}}" class="collapsed" aria-expanded="false">
                                    <img class="" src="{{asset('public/icon/tipeunit.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                                    <span class="ml-3 item-text">Tampilan Gedung</span>

                                </a>
                            </li>
                        </ul>
                    </div>


                </li>

                <li class="nav-item active">
                    <a href="{{url('/riwayat')}}" class="collapsed" aria-expanded="false">
                        <img class="" src="{{asset('public/icon/riwayat.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                        <span class="ml-3 item-text">Riwayat Pemesanan</span>

                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>