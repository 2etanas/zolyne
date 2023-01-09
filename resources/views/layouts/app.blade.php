<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zolyne Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light shadow-sm manoNavbaras">
            <div class="container">
             
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('storephoto/Logo-01.png')}}" alt="logo" height="200px" class="pav-logo">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div></div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/krepselis">Krepšelis</a>
                                </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registruokis') }}</a>
                                </li>
                            @endif
                        @else
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
                        <li class="nav-item">
                                    <a class="nav-link" href="/susisiekite">Susisiekite</a>
                                </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="masterContainer @yield('morze')">
       @yield('content')
        <!-- <div class="login-container prekiuContainer">
        <div id="app">
        

        <main class="py-4">
           
        </main>
         </div>
        </div> -->
        
        <div class="rightBlock @yield('morzeRightBlock')">
        <div class="infoContainer">
            <div class="infoCard">Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto aliquam optio quidem corporis. Temporibus tenetur eaque placeat ratione assumenda distinctio atque corporis neque magni expedita explicabo, eius aut adipisci eveniet. dolor sit amet consectetur adipisicing elit...</div>
            <div class="infoCard">Lorem ipsum dolor sit amet consectetur adipisicing elit... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut quas cum quo eligendi sequi harum laudantium saepe commodi reiciendis molestiae quod odio, aperiam accusantium hic in eum cupiditate aliquid sunt!</div>
            <div class="infoCard">Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi praesentium perspiciatis distinctio iusto ratione in delectus totam ex enim obcaecati fuga non nostrum, sequi est inventore optio doloribus. Neque, perspiciatis? sit amet consectetur adipisicing elit...</div>
            <div class="infoCard">Lorem ipsum dolor sit amet consectetur adipisicing elit...</div>
        </div>
        <div class="contactBox @yield('morzeRightBlock')">
           <div class="contacts">
            <li>Kontaktai: random gatve Vilnius, Lietuva</li> 
            
           <li>Tel: 222223331344</li> 
            <li><a href="#">Privatumo politika</a></li>
        </div>
           <div class="mapBoxas @yield('morzeRightBlock')">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30145.73201250757!2d25.263386910444936!3d54.68764019128842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd9419df4df72d%3A0x84cdab3f82f7f6fb!2sGediminas%20Castle%20Tower!5e0!3m2!1sen!2slt!4v1666022225781!5m2!1sen!2slt" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
        </div>
    </div>
    </div>
    
</body>
</html>
