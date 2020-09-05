 <!-- navbar -->
    <div class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid nav-kanan">
          <a class="navbar-brand" href="#"><img src="{{asset('site_/img/logo.png')}}"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav navbar-left justify-content-end ">
              <a class="nav-link active mx-3 a" aria-current="page" href="{{route('home')}}">Home</a>
              <a class="nav-link mx-3 a" href="html/about.html">About</a>
              <a class="nav-link mx-3 a" href="#">Popular</a>
              <a class="nav-link nav-width mx-3 a" href="#" tabindex="-1">Contact Us</a>
            
              @auth
                @if(auth()->user()->role == "admin")

                  <a class="nav-link nav-width mx-3 a btn btn-1" href="{{route('dashboard')}}">Dashboard</a>

                @elseif(auth()->user()->role = "tamu")
                <a class="nav-link mx- a" href="{{route('history_reservasi', auth()->user()->email)}}">Cart</a>

                  <div class="dropdown">
                 <a class="btn dropdown-toggle" href="#" role="button" id="profile" data-toggle="dropdown" aria-expanded="false">
                 {{auth()->user()->name}}
                </a>
                  <ul class="dropdown-menu" aria-labelledby="profile">
                    <li><a class="dropdown-item" href="{{route('profile_tamu')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('edit_profile_tamu', auth()->user()->email)}}">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('edit_password_tamu')}}">Change Password</a></li>
                  </ul>
                </div>
                       
                @endif          

              @endauth
              <form class="container-fluid justify-content-start mx-2">
                 @guest
                  <a class="btn btn-1 btn-md px-4 button-navbar" href="{{route('login')}}">Sign In</a>
              @endguest
              </form>
            </div>
          </div>
        </div>
      </nav>
      <!-- navbar -->