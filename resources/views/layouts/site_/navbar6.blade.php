<!-- navbar -->
    <div class="navbar-type-4 bg-light">
      <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('site_/img/logo.png')}}" class="logo-wishlist"></a>
          <button class="navbar-toggler border-2" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars active"></i>
          </button>
          <div class="collapse navbar-collapse ml-sm-4" id="navbarText">
            <div class="navbar-nav mr-5 pr-5 justify-content-end ">
              <a class="nav-link mx-3 a" href="{{route('home')}}">Home</a>
              <a class="nav-link mx-3 a" href="{{route('about')}}">About</a>
              <a class="nav-link mx-3 a" href="{{route('popular')}}">Popular</a>
              <a class="nav-link nav-width mx-3 a" href="{{route('contact')}}">Contact Us</a>
             
               @guest
                <div class="container-fluid justify-content-start mx-2">
                  <a href="{{route('login')}}" class="btn btn-1 btn-md px-4 button-navbar">Sign In</a>
                </div>
              @endguest
              @auth
                @if(auth()->user()->role == "superadmin") 
                <div class="container-fluid justify-content-start mx-2">
                  <a href="{{route('dashboard')}}" class="btn btn-1 btn-md px-4 button-navbar">Dashboard</a>
                </div>
                @elseif(auth()->user()->role == "admin")
                <div class="container-fluid justify-content-start mx-2">
                  <a href="{{route('dashboard')}}" class="btn btn-1 btn-md px-4 button-navbar">Dashboard</a>
                </div>
              @elseif(auth()->user()->role == "tamu")
               <a class="nav-link mx-3 a" href="{{route('review', auth()->user()->email)}}">Review</a>
                <a class="nav-link mx-3 a" href="{{route('whislist', auth()->user()->email)}}"><img src="{{asset('site_/img/ic_keranjang.png')}}"></a>
                <a class="nav-link mx-0 a link-right" href="#" onclick="myProfil3()"><img src="{{asset('site_/img/ic_profil.png')}}" class="img-left mr-2">{{auth()->user()->name}}</a>
              @endif
              @endauth
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- navbar -->

    @auth
         <!-- popup -->
    <div class="popup2">
      <span class="popuptext p-3" id="myPopup">
        <div class="d-flex">
          <img src="{{auth()->user()->profile->gambar()}}" class="icon-popup ml-3 mr-3">
          <a href="" class="active my-auto text-decoration-none"><h3 class="w-900">{{auth()->user()->name}}</h3></a>
        </div>
        <hr class="mt-2 active">
        <div class="d-flex py-2 px-3">
          <i class="fas fa-user mt-1 mr-3"></i>
          <a href="{{route('profile_tamu')}}" class="text-decoration-none active"><h6>Lihat Profil</h6></a>
        </div>
        <div class="d-flex py-2 px-3">
          <i class="fas fa-pen mt-1 mr-3"></i>
          <a href="{{route('edit_profile_tamu', auth()->user()->email)}}" class="text-decoration-none active"><h6>Edit Profil</h6></a>
        </div>
        <div class="d-flex py-2 px-3">
          <i class="fas fa-lock mt-1 mr-3"></i>
          <a href="{{route('edit_password_tamu')}}" class="text-decoration-none active"><h6>Ganti Password</h6></a>
        </div>
        <div class="d-flex py-2 px-3">
          <i class="fas fa-power-off mt-1 mr-3"></i>
          <a href="{{ route('logout') }}" class="text-decoration-none active"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <h6>Logout</h6></a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
            </form>
        </div>
      </span>
    </div>
    <!-- popup -->
    @endauth