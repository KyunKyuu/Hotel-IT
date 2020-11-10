 <!-- navbar -->
    <div class="navbar-review">
      <nav class="navbar navbar-expand-sm">
        <div class="container">
          <div class="collapse navbar-collapse sm-mt-2 ml-sm-4" id="navbarText">
            <a class="nav-link text-white" href="#">Follow Us On</a>
            <a class="nav-link pl-0 pr-1 text-white" href="#"><img src="{{asset('site_/img/ic_facebook.png')}}" class="facebook"></a>
            <a class="nav-link p-1 text-white" href="#"><img src="{{asset('site_/img/ic_instagram.png')}}"></a>
            <a class="nav-link p-1 text-white" href="#"><img src="{{asset('site_/img/ic_wa.png')}}"></a>
          </div>
          <div class="collapse navbar-collapse ml-sm-4" id="navbarText">
            <a class="nav-link pr-2 text-white" href="#">Notification</a>
            <a class="nav-link pl-0 pr-2 text-white" href="#"><img src="{{asset('site_/img/ic_notif.png')}}"></a>
            <a class="nav-link pl-2 pr-2 text-white" href="#">Help</a>
            <a class="nav-link pl-0 text-white" href="#"><img src="{{asset('site_/img/ic_Help.png')}}"></a>
            <span class="navbar-text">
              <a class="nav-link mx-2 pl-0 sm-pr-0 a link-right text-white" onclick="myProfil()" href="#"><img src="{{asset('site_/img/ic_profil.png')}}" class="img-left mr-2">{{auth()->user()->name}}</a>
            </span>
          </div>
        </div>
      </nav>
    </div>
    <!-- navbar -->

     @auth
         <!-- popup -->
    <div class="popup-detail">
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

    <!-- header -->
    <div class="navbar-review2">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('site_/img/logo.png')}}" class="d-inline-block align-top logo"></a>
          
          <div class="collapse navbar-collapse w-inherit">
             <a class="nav-link active" href="#"><h3 class="mb-0 ml-3 w-900">REVIEW</h3></a>
          </div>
        </div>
      </nav>
    </div>
    <!-- header -->