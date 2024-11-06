<header>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <nav class="main-nav">
        <div class="nav-center">
            <figure class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </figure>
            <ul>
                <li><a href="">Coffee</a></li>
                <li><a href="{{ route('products.menu') }}">Menu</a></li>
                <li><a href="">Delivery</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>
        <div class="nav-right">
            @if (Auth::check())
                <ul>
                    <li>
                        <a href="{{ route('profile.show') }}">Profile</a>
                    </li>
                    <li>
                        <p>Xin chào, {{ Auth::user()->username }} !</p>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                </ul>
            @else
                <ul>
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
</header>
