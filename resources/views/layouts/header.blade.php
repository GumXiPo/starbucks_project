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
                    <!-- Biểu tượng giỏ hàng -->
                    <li>
                        <a href="javascript:void(0)" id="cart-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
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

    <!-- Pop-up thông báo giỏ hàng -->
    <div id="cart-notification" class="cart-notification">
        <h3>Giỏ Hàng</h3>
        <div id="cart-items">
            <!-- Các sản phẩm trong giỏ sẽ hiển thị ở đây -->
        </div>
        <button id="view-cart" onclick="window.location.href='/cart'">Xem Giỏ Hàng</button>
    </div>

    <!-- CSS cho Pop-up thông báo -->
    <style>
        #cart-icon {
            display: flex;         /* Đảm bảo biểu tượng giỏ hàng được bao bọc trong một vùng có thể nhấp chuột */
            align-items: center;   /* Căn giữa biểu tượng */
            justify-content: center; /* Căn giữa biểu tượng */
            padding: 10px;         /* Tăng kích thước vùng nhấp chuột */
            cursor: pointer;      /* Thêm con trỏ tay để người dùng biết có thể nhấp vào */
        }
        /* Pop-up thông báo */
        .cart-notification {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            z-index: 9999;
        }

        .cart-notification h3 {
            margin: 0;
            font-size: 18px;
            text-align: center;
        }

        .cart-notification button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .cart-notification button:hover {
            background-color: #45a049;
        }
        
    </style>
</header>

<!-- JavaScript cho Pop-up Giỏ Hàng -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartIcon = document.getElementById('cart-icon');
    const cartNotification = document.getElementById('cart-notification');
    const cartItemsContainer = document.getElementById('cart-items');

    // Khi nhấn vào biểu tượng giỏ hàng, hiển thị pop-up thông báo giỏ hàng
    cartIcon.addEventListener('click', function () {
        cartNotification.style.display = 'block'; // Hiển thị pop-up

        // Lấy dữ liệu giỏ hàng từ API và hiển thị
        fetch('/api/cart')
            .then(response => response.json())
            .then(data => {
                cartItemsContainer.innerHTML = ''; // Xóa các sản phẩm cũ

                // Thêm các sản phẩm vào pop-up
                if (data.cartItems && Object.keys(data.cartItems).length > 0) {
                    for (let productId in data.cartItems) {
                        const item = data.cartItems[productId];
                        const cartItem = document.createElement('div');
                        cartItem.classList.add('cart-item');
                        cartItem.innerHTML = `
                            <strong>${item.name}</strong> 
                            x${item.quantity} - 
                            ${item.price} VND
                        `;
                        cartItemsContainer.appendChild(cartItem);
                    }
                } else {
                    cartItemsContainer.innerHTML = '<p>Giỏ hàng của bạn trống.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching cart data:', error);
            });
    });

    // Đóng pop-up nếu người dùng nhấp ra ngoài
    window.addEventListener('click', function (event) {
        if (!cartNotification.contains(event.target) && event.target !== cartIcon) {
            cartNotification.style.display = 'none'; // Ẩn pop-up
        }
    });
});
</script>
