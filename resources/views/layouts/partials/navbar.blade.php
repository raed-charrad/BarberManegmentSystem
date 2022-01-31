
<header role="banner">
 
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
       <div class="container">
         <a class="navbar-brand" href="/">Alotan</a>
         <div class="collapse navbar-collapse navbar-light " id="navbarsExample05" style="justify-content: flex-end; !important">
           <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
             <li class="nav-item">
               <a class="nav-link" href="/">Home</a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="hairstyle.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Haircut</a>
               <div class="dropdown-menu" aria-labelledby="dropdown04">
                 <a class="dropdown-item" href="/hairstyle">Crew Cut</a>
                 <a class="dropdown-item" href="/hairstyle">Regular Hair Cut</a>
                 <a class="dropdown-item" href="/hairstyle">Shampoo + Cut</a>
                 <a class="dropdown-item" href="/hairstyle">Beard Trim with Razor</a>
                 <a class="dropdown-item" href="/hairstyle">Hair Color</a>
               </div>

             </li>
             <li class="nav-item">
               <a class="nav-link active" href="/about">About</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="/contact">Contact</a>
             </li>
         
            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                              <a class="nav-link" href="/home">Admin</a>
                            </li>
                            <li class="nav-item dropdown">
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
           </ul>
           
         </div>
       </div>
     </nav>
      </header>