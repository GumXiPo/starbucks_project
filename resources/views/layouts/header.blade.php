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
            <div id="menu-icon" class="menu-icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul id="nav-links" class="nav-links">
                <li><a href="/">Coffee</a></li>
                <li><a href="{{ route('products.menu') }}">Menu</a></li>
                <li><a href="{{ route('order.index') }}">Delivery</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
                <li>
                    <a href="{{ route('feedback.feedbackshow') }}">
                        <i class="fa-solid fa-comment-dots"></i> Feedback
                    </a>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS cho Pop-up thông báo -->
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
            width: 400px;
            z-index: 9999;
        }

        .cart-notification h3 {
            margin: 0;
            font-size: 18px;
            text-align: center;
        }

        .cart-notification .remove-item {
            width: 10%;
            color: #A6AEBF;
        }

        .cart-notification .remove-item:hover {
            color: #45a049;
        }
        .cart-notification #view-cart {
            width: 100%;
            padding: 10px;
            background-color: #45a049;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            transition: ;
        }

        .cart-notification #view-cart:hover {
            background-color: #A6AEBF;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0;
            padding: 10px 0;
            border-top: 1px solid #ccc;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }

        .remove-item {
            background: none;
            border: none;
            color: #ff4d4d;
            cursor: pointer;
            font-size: 18px;
        }

        .total-amount {
            padding: 10px 0;
            border-top: 1px solid #ccc;
            text-align: right;
            font-weight: bold;
        }
        .nav-links {
        display: none;
        flex-direction: column;
        background-color: #fff;
        position: absolute;
        top: 60px;
        right: 0;
        width: 100%;
        border-top: 1px solid #ccc;
        z-index: 1000;
    }

    /* Hiển thị lại menu khi có class 'active' */
    .nav-links.active {
        display: flex;
    }

    /* Style cho menu-icon */
    .menu-icon {
        display: none;
        cursor: pointer;
        font-size: 24px;
    }

    /* Responsive cho màn hình nhỏ */
    @media (max-width: 768px) {
        .menu-icon {
            display: block;
        }

        .nav-links {
            width: 100%;
            text-align: center;
        }

        .nav-center ul {
            display: none;
        }
    }
        /* Responsive */
        @media (max-width: 768px) {
            .logo{
                display: none;
            }
            .nav-center ul {
                flex-direction: column;
                text-align: center;
                margin-top: 10px;
            }

            .nav-right {
                margin-top: 10px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .nav-center ul li {
                margin: 5px 0;
            }

            .nav-right ul li {
                margin: 5px 0;
            }

            .cart-notification {
                width: 90%;
                top: 50px;
                right: 5%;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item img {
                margin-bottom: 10px;
            }
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
        let totalAmountContainer;

        // Hiển thị pop-up giỏ hàng khi nhấn vào biểu tượng giỏ hàng
        cartIcon.addEventListener('click', function () {
            cartNotification.style.display = 'block';

            // Gọi API lấy dữ liệu giỏ hàng và cập nhật giao diện
            fetch('/api/cart')
                .then(response => response.json())
                .then(data => {
                    cartItemsContainer.innerHTML = ''; // Xóa các sản phẩm cũ

                    let totalQuantity = 0;
                    let totalAmount = 0;

                    // Thêm sản phẩm vào pop-up
                    if (data.cartItems && Object.keys(data.cartItems).length > 0) {
                        for (let productId in data.cartItems) {
                            const item = data.cartItems[productId];
                            const cartItem = document.createElement('div');
                            cartItem.classList.add('cart-item');
                            cartItem.setAttribute('id', `cart-item-${productId}`);
                            cartItem.innerHTML = `
                                <img src="{{ asset('images/product/') }}/${item.image ?? 'default.png'}" 
                                    alt="${item.name}" style="width: 50px; margin-right: 10px;">
                                <div>
                                    <strong>${item.name}</strong><br>
                                    x${item.quantity} - 
                                    ${item.price} VND
                                </div>
                                <button class="remove-item" onclick="removeFromCart(${productId})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            `;
                            cartItemsContainer.appendChild(cartItem);
                            totalQuantity += Number(item.quantity);
                            totalAmount += item.price * item.quantity;
                        }

                        // Thêm tổng số lượng và tổng tiền vào cuối pop-up
                        totalAmountContainer = document.createElement('div');
                        totalAmountContainer.classList.add('total-amount');
                        totalAmountContainer.innerHTML = `
                            <p><strong>Total Quantity:</strong> ${totalQuantity}</p>
                            <p><strong>Total Amount:</strong> ${totalAmount} VND</p>
                        `;
                        cartItemsContainer.appendChild(totalAmountContainer);
                    } else {
                        cartItemsContainer.innerHTML = '<p>Your shopping cart is empty.</p>';
                    }

                    // Cập nhật số lượng sản phẩm trong giỏ hàng
                    cartCount.textContent = totalQuantity;
                    cartItemCount.textContent = totalQuantity;
                })
                .catch(error => {
                    console.error('Error fetching cart data:', error);
                });
        });

        // Đóng pop-up nếu người dùng nhấp ra ngoài khu vực pop-up và biểu tượng giỏ hàng
        window.addEventListener('click', function (event) {
            if (!cartNotification.contains(event.target) && event.target !== cartIcon) {
                cartNotification.style.display = 'none';
            }
        });
    });

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeFromCart(productId) {
        // Xóa sản phẩm khỏi giao diện ngay lập tức
        const cartItem = document.querySelector(`#cart-item-${productId}`);
        if (cartItem) cartItem.remove();

        // Gửi yêu cầu xóa sản phẩm lên server
        fetch(`/cart/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Error:', data.message);
            }

            // Cập nhật lại tổng số lượng và tổng tiền
            updateCartSummary();
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    }

    function updateCartSummary() {
        // Gọi API để lấy tổng số lượng và tổng tiền mới
        fetch('/api/cart')
            .then(response => response.json())
            .then(data => {
                let totalQuantity = 0;
                let totalAmount = 0;

                for (let productId in data.cartItems) {
                    const item = data.cartItems[productId];
                    totalQuantity += item.quantity;
                    totalAmount += item.price * item.quantity;
                }

                document.getElementById('cart-count').textContent = totalQuantity;
                document.getElementById('cart-item-count').textContent = totalQuantity;
                if (totalAmountContainer) {
                    totalAmountContainer.innerHTML = `<p><strong>Total Amount:</strong> ${totalAmount} VND</p>`;
                }
            });
    }
        document.addEventListener('DOMContentLoaded', function () {
            const menuIcon = document.getElementById('menu-icon');
            const navLinks = document.getElementById('nav-links');

            menuIcon.addEventListener('click', function () {
                // Toggle class 'active' để hiển thị/ẩn menu
                navLinks.classList.toggle('active');
            });
        });
</script>
