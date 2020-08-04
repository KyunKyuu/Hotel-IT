<header class="header-area">
        <!-- Search Form -->
        <div class="search-form d-flex align-items-center">
            <div class="container">
                <form action="index.html" method="get">
                    <input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
                    <button type="submit"><i class="icon_search"></i></button>
                </form>
            </div>
        </div>

        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="top-header-content">
                            <a href="#"><i class="icon_phone"></i> <span>(123) 456-789-1230</span></a>
                            <a href="#"><i class="icon_mail"></i> <span>teguh@gmail.com</span></a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="top-header-content">
                            <!-- Top Social Area -->
                            <div class="top-social-area ml-auto">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('kamar')}}">Kamar</a></li>
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./index.html">- Home</a></li>
                                            <li><a href="{{route('kamar')}}">- Kamar</a></li>
                                            <li><a href="./single-room.html">- Single Rooms</a></li>
                                            <li><a href="./about.html">- About Us</a></li>
                                            <li><a href="./blog.html">- Blog</a></li>
                                            <li><a href="./single-blog.html">- Single Blog</a></li>
                                            <li><a href="./contact.html">- Contact</a></li>
                                            <li><a href="#">- Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="./blog.html">News</a></li>
                                    <li><a href="./contact.html">Contact</a></li>

                                <!-- Search -->
                        

                                <!-- Book Now -->
                        @auth
                         @if (auth()->user()->role == 'tamu')

                                <li><img src="{{auth()->user()->tamu->gambar()}}" class="rounded-circle" width="45"> {{auth()->user()->name}}
                                    <ul class="dropdown">
                                        <li><b>&nbsp;&nbsp;&nbsp;Sunting</b></li>
                                         <li><a href="{{ route('profile_tamu') }}">Profile Saya</a><li>
                                            <li><a href="{{ route('edit_profile_tamu', auth()->user()->id ) }}">Edit Profile</a><li>
                                        <li>
                                           <br>
                                        <a  class="btn btn-info" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                         </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                        </li>
                                    </ul>
                                </li>

                                </ul>
                        @elseif(auth()->user()->role == 'admin')

                                <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="{{ route('dashboard') }}">Dashboard <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                             </div>
                               <div class="book-now-btn ml-3 ml-lg-5">
                                    <i class="fa fa-sign-out" aria-hidden="true">
                                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                         </a>
                                    </i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                              </div>

                        @endif
                        @endauth

                        @guest
                                     <div class="book-now-btn ml-3 ml-lg-5">
                                      <a href="{{ route('login') }}">Login To Book Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>  
                                    </div>
                        @endguest             
                        
                        
                        
                      
                                 
         
                       
                           </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->