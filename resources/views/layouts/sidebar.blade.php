Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
    
            <ul class="nav nav-primary">

                <li class="nav-item {{ (request()->is('/') || request()->is('progresskelompok*')||request()->is('showbio')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pp" class="collapsed" aria-expanded="false">
						      
                    <img class="" src="{{asset('public/icon/rumah.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Profil Perusahaan</span>
						
						<span class="caret"></span>
					</a>

					<div class="collapse" id="pp">
					    
					<ul class="nav nav-collapse">
						<li class="{{ (request()->is('/')) ? '' : 'active' }}">
                            <a href="{{url('/')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/ikhtisar.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Ikhtisar Perusahaan</span>
						
                            </a>
                        </li>
                        
                        
                        <li class="{{ (request()->is('showbio')) ? '' : 'active' }}">
                            <a href="{{url('showbio')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/produk.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Produk Perusahaan</span>
						
                            </a>
                        </li>
                        </ul>
                    </div>


                </li>


                <li class="nav-item {{ (request()->is('/') || request()->is('progresskelompok*')||request()->is('showbio')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#ap" class="collapsed" aria-expanded="false">
								      
                    <img class="" src="{{asset('public/icon/pemasaran.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
            <span class="ml-3 item-text">Alat Pemasaran</span>
						
						<span class="caret"></span>
					</a>

					<div class="collapse" id="ap">
					    
					<ul class="nav nav-collapse">
						<li class="{{ (request()->is('/')) ? '' : 'active' }}">
                            <a href="{{url('/')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/promo.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Promo</span>
						
                            </a>
                        </li>
                        
                        
                        <li class="{{ (request()->is('showbio')) ? '' : 'active' }}">
                            <a href="{{url('showbio')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/tipeunit.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Tipe Unit</span>
						
                            </a>
                        </li>
                      

                   
						<li class="{{ (request()->is('/')) ? '' : 'active' }}">
                            <a href="{{url('/')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/filosofi.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Filosofi</span>
						
                            </a>
                        </li>
                        
                        
                        <li class="{{ (request()->is('showbio')) ? '' : 'active' }}">
                            <a href="{{url('showbio')}}" class="collapsed" aria-expanded="false">
                            <img class="" src="{{asset('public/icon/tagline.png')}}" alt="User Avatar " style=" height:20px; width:20px;">
                     <span class="ml-3 item-text">Tagline</span>
						
                            </a>
                        </li>
                        </ul>
                    </div>

                    


                </li>
           


            </ul>


    </div>
</div>
<!-- End Sidebar