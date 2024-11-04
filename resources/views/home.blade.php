@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>

</head>

<body>

<header>
    <figure class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </figure>
    <nav class="main-nav">
        <ul>
            <li><a href="">Coffee</a></li>
            <li><a href="{{ route('products.menu') }}">Menu</a></li>
            <li><a href="">Delivery</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Cart</a></li>

            @if (Auth::check())
                <li>
                    <a href="{{ route('profile.show') }}">Profile</a> <!-- Nút chuyển đến trang profile -->
                </li>
                <li>
                    <p>Xin chào, {{ Auth::user()->full_name }}!</p> <!-- Hiển thị tên người dùng -->
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <script>
                    alert("Bạn chưa đăng nhập.");
                </script>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </ul>
    </nav>
</header>


    <main>
        <section class="carousel next">
            <div class="list">
                <article class="item other_1">
                    <div class="main-content"   
                        style="background-color: #B17457;">
                        <div class="content">
                            <h2>Caffe Latte, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                        <img src="{{ asset('images/1.png') }}" alt="">
                        <figcaption>Caffe Latte, a new product</figcaption>
                    </figure>
                </article>
                <article class="item active">
                    <div class="main-content"
                        style="background-color: #f5bfaf;">
                        <div class="content">
                            <h2>Strawberry mocha, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                        <img src="{{ asset('images/2.png') }}" alt="">

                        <figcaption>Strawberry mocha, a new product</figcaption>
                    </figure>
                </article>
                <article class="item other_2">
                    <div class="main-content"
                        style="background-color: #dedfe1;">
                        <div class="content">
                            <h2>Doppio espresso, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                        <img src="{{ asset('images/3.png') }}" alt="">
                        <figcaption>Doppio espresso, a new product</figcaption>
                    </figure>
                </article>
                <article class="item">
                    <div class="main-content"
                        style="background-color: #7eb63d;">
                        <div class="content">
                            <h2>Matcha latte macchiato, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                        <img src="{{ asset('images/4.png') }}" alt="">

                        <figcaption>Matcha latte macchiato, a new product</figcaption>
                    </figure>
                </article>
            </div>
            <div class="arrows">
                <button id="prev">
                    < </button>
                        <button id="next">></button>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>