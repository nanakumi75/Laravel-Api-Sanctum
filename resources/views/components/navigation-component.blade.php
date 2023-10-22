<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="/" class="navbar-brand">
         <img src="{{ URL('images/logo.jpg') }}" alt="" id="logo">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
          <span class="navbar-toggle-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
           @auth
             <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/students') }}" class="nav-link">Search Students</a>
                </li>
             </ul>
             <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/chatify') }}" class="nav-link"><i class="bi bi-chat"></i> Chatify Messenger</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/account') }}" class="nav-link">My Account</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">Logout</a>
                </li>
             </ul>
            @else
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/students') }}" class="nav-link">Search Students</a>
                </li>
             </ul>
             <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/register') }}" class="nav-link">Create Account</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/login') }}" class="nav-link">Login</a>
                </li>
             </ul>
            @endauth
        </div>
    </div>
</nav>
 