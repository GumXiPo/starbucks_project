<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li><a href="/">Coffee</a></li>
                <li><a href="{{ route('products.menu') }}">Menu</a></li>
                <li><a href="">Delivery</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
                <li>
                    <a href="{{ route('feedback.feedbackshow') }}"><i class="fa-solid fa-comment-dots"></i> Feedback</a>
                </li>
            </ul>
        </div>
        <div class="nav-right">
            @if (Auth::check())
                <ul>
                    <li>
                        <p>Xin chào, {{ Auth::user()->username }} !</p>
                    </li>
                    <li>
                        <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </form>
                    </li>
                </ul>
            @else
                <ul>
                    <li>
                        <!-- <a href="{{ route('login') }}">Login</a> -->
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Sign In</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
</header>
