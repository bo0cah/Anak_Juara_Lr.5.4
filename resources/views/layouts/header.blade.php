<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container" style="padding-top:10px">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar "></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a href="#" class="navbar-brand" style="padding-top:0px; margin-top: 0px"><img src="{{asset('../img/logo-rumah-zakat.png') }}" alt="Logo" style="height: 40px"></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav nav-pills navbar-right">
         @if (Auth::guest())
             {{-- <li><a href="{{ route('login') }}">Login</a></li>
             <li><a href="{{ route('register') }}">Register</a></li> --}}
         @else
            <li role="presentation" class=""><a href="{{url('/')}}"><i class="fa fa-file"></i> Pengajuan</a></li>
            <li role="presentation" class=""><a href="{{url('/data-keluar')}}"><i class="fa fa-print"></i> Data Keluar</a></li>
            <li role="presentation" class=""><a href="{{url('/penerima')}}"><i class="fa fa-archive"></i> Penerima</a></li>
            <!--Dropdown Menu-->
            <li class="dropdown" >
               <a href="" class="dropdown-toggle" id="dropDown1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"> </i>
                  {{Auth::check() ? Auth::user()->name : 'Akun'}} <span class="caret"></span>
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropDown1">
                  <li >
                     <a href="{{ url('akun') }}">Profil</a>
                  </li>
                  <li>
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                     </a>  
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </li>
               </ul>
            </li>
         @endif
         </ul>
      </div><!--/.nav-collapse -->
   </div>
</nav>