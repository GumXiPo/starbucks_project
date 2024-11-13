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
                <li><a href="{{ route('order.index') }}">Delivery</a></li>
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
                    <li>
                        <a href="javascript:void(0)" class="cart-icon" aria-label="Giỏ hàng">
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

    <div id="cart-notification" class="cart-notification" aria-hidden="true">
        <h3>Your cart</h3>
        <div id="cart-items">
            <!-- Các sản phẩm trong giỏ sẽ hiển thị ở đây -->
        </div>
        <button id="view-cart" onclick="window.location.href='/cart'">Show cart</button>

    </div>

    <style>
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
            width: 25%;
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

        .cart-item{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartIcon = document.querySelector('.cart-icon');
    const cartNotification = document.getElementById('cart-notification');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');
    const cartItemCount = document.getElementById('cart-item-count');

    // Khi nhấn vào biểu tượng giỏ hàng, hiển thị pop-up thông báo giỏ hàng
    cartIcon.addEventListener('click', function () {
        cartNotification.style.display = 'block'; // Hiển thị pop-up

        // Lấy dữ liệu giỏ hàng từ API và hiển thị
        fetch('/api/cart')
            .then(response => response.json())
            .then(data => {
                cartItemsContainer.innerHTML = ''; // Xóa các sản phẩm cũ

                let totalQuantity = 0;

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
                        totalQuantity += item.quantity;
                    }
                } else {
                    cartItemsContainer.innerHTML = '<p>Giỏ hàng của bạn trống.</p>';
                }

                // Cập nhật số lượng sản phẩm trong giỏ hàng
                cartCount.textContent = totalQuantity;
                cartItemCount.textContent = totalQuantity;
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
