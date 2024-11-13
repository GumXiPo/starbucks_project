<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">   
    <title>Menu Sản Phẩm</title>
    <style>
        /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap");

        /*=============== VARIABLES CSS ===============*/
        :root {
        /*========== Colors ==========*/
        /*Color mode HSL(hue, saturation, lightness)*/
        --white-color: hsl(170, 12%, 98%);
        --gray-color: hsl(170, 4%, 60%);
        --black-color: hsl(170, 12%, 8%);

        /*========== Font and typography ==========*/
        /*.5rem = 8px | 1rem = 16px ...*/
        --body-font: "Poppins", serif;
        --normal-font-size: .938rem;
        }

        /*========== Responsive typography ==========*/
        @media screen and (min-width: 1120px) {
        :root {
            --normal-font-size: 1rem;
        }
        }

        /*=============== BASE ===============*/
        * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        }

        body {
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        background-color: var(--white-color);  
        }

        a {
        text-decoration: none;
        }

        img {
        display: block;
        max-width: 100%;
        height: auto;
        }

        /*=============== CARD ===============*/
        .product-menu {
        display: grid;
        margin-inline: 1.5rem;
        padding-block: 3rem;
        }

        .card__container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Hiển thị 4 cột trên mỗi hàng */
            gap: 2rem;
            justify-content: center;
        }
        .card__article {
        position: relative;
        background-color: var(--white-color);
        border: 2px solid var(--gray-color);
        padding: 3rem 1.5rem 1.5rem;
        display: grid;
        row-gap: 1rem;
        overflow: hidden;
        transition: background-color .6s;
        }

        .card__img {
            width: 200px;
            height: 200px; /* Đặt chiều cao để tạo thành hình vuông */
            object-fit: cover; /* Cắt ảnh để lấp đầy khung */
            justify-self: center;
            filter: drop-shadow(0 8px 24px hsla(170, 12%, 8%, .1));
            transition: transform .4s;
        }
        .card__data {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        transition: transform .4s, opacity .4s;
        }

        .card__title {
            font-size: var(--normal-font-size);
            font-weight: 400;
            white-space: nowrap; /* Ngăn không cho text xuống dòng */
            overflow: hidden; /* Ẩn phần văn bản thừa */
            text-overflow: ellipsis; /* Thêm dấu "..." khi văn bản dài */
            max-width: 100%; /* Đảm bảo rằng phần tử không vượt quá chiều rộng của container */
            display: block; /* Chắc chắn rằng phần tử hiển thị như một khối */
            color: var(--gray-color); 
        }
        .card__price{
            color: var(--gray-color); 
        }

        .card__bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transform: scale(1.3);
        z-index: -1;
        transition: transform .4s;
        }

        .card__button {
        background-color: var(--white-color);
        padding: .75rem 1rem;
        color: var(--black-color);
        display: flex;
        align-items: center;
        column-gap: .5rem;
        justify-self: center;
        box-shadow: 0 8px 24px hsla(170, 12%, 8%, .1);
        position: absolute;
        bottom: -1.5rem;
        opacity: 0;
        pointer-events: none;
        transition: transform .4s, opacity .4s;
        }

        .card__button i {
        font-size: 1.25rem;
        transition: transform .4s;
        }
        .card__button:hover i {
        transform: translateX(.5rem);
        }

        /* Card animation */
        .card__article:hover .card__img {
        transform: translateY(-1.5rem);
        }

        .card__article:hover .card__data {
        transform: translateY(-4.5rem);
        opacity: 0;
        }

        .card__article:hover {
        background-color: transparent;
        }

        .card__article:hover .card__bg {
        transform: scale(1);
        }

        .card__article:hover .card__button {
        transform: translateY(-3.75rem);
        opacity: 1;
        pointer-events: initial;
        }
        /* Chỉnh giao diện phân trang */
        .pagination {
            display: flex;
            justify-content: center; /* Căn giữa các liên kết phân trang theo chiều ngang */
            align-items: center; /* Căn giữa các liên kết phân trang theo chiều dọc */
            gap: 10px; /* Khoảng cách giữa các nút */
            margin-top: 2rem; /* Khoảng cách phía trên */
            width: 100%; /* Đảm bảo chiếm toàn bộ chiều rộng của trang */
            text-align: center; /* Căn giữa chữ trong tất cả các phần tử */
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px; /* Đặt padding để các nút lớn hơn */
            margin: 0 5px; /* Khoảng cách giữa các nút */
            color: var(--gray-color); /* Màu chữ mặc định */
            text-decoration: none; /* Xóa gạch dưới */
            border-radius: 5px; /* Bo góc cho các nút */
            background-color: var(--white-color); /* Nền trắng cho các nút */
            transition: color 0.3s; /* Hiệu ứng chuyển màu chữ */
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px; /* Đặt padding để các nút lớn hơn */
            margin: 0 5px; /* Khoảng cách giữa các nút */
            color: var(--gray-color); /* Màu chữ mặc định */
            text-decoration: none; /* Xóa gạch dưới */
            border-radius: 5px; /* Bo góc cho các nút */
            background-color: var(--white-color); /* Nền trắng cho các nút */
            transition: color 0.3s; /* Hiệu ứng chuyển màu chữ */
            display: inline-flex; /* Sử dụng inline-flex để căn giữa chữ */
            align-items: center;
            justify-content: center;
        }

        /* Màu chữ thay đổi khi hover */
        .pagination a:hover,
        .pagination span:hover {
            color: #4f8b69; /* Màu chữ xanh khi hover */
        }

        /* Làm nổi bật trang hiện tại */
        .pagination .active {
            font-weight: bold; /* Làm đậm cho trang hiện tại */
            color: #4f8b69; /* Màu chữ xanh cho trang đang chọn */
        }

        /* Các nút phân trang không có viền */
        .pagination a,
        .pagination span {
            padding: 10px 15px; /* Đặt padding để các nút lớn hơn */
            margin: 0 5px; /* Khoảng cách giữa các nút */
            color: var(--gray-color); /* Màu chữ mặc định */
            text-decoration: none; /* Xóa gạch dưới */
            border-radius: 5px; /* Bo góc cho các nút */
            background-color: var(--white-color); /* Nền trắng cho các nút */
            transition: color 0.3s; /* Hiệu ứng chuyển màu chữ */
            display: inline-flex; /* Sử dụng inline-flex để căn giữa chữ */
            align-items: center;
            justify-content: center;
        }

        /* Màu chữ thay đổi khi hover */
        .pagination a:hover,
        .pagination span:hover {
            color: #4f8b69; /* Màu chữ xanh khi hover */
        }

        /* Trạng thái vô hiệu hóa (chẳng hạn Previous khi đang ở trang đầu tiên) */
        .pagination .disabled {
            color: var(--gray-color); /* Màu chữ nhạt hơn cho nút vô hiệu hóa */
            pointer-events: none; /* Vô hiệu hóa sự kiện click */
            background-color: #f2f2f2; /* Nền xám nhạt cho nút vô hiệu hóa */
        }
        /* Thêm CSS cho container */
        /* Thêm CSS cho container */
        .menu-search-container {
            display: flex;
            justify-content: space-between; /* Khoảng cách giữa h1 và form tìm kiếm */
            align-items: center; /* Căn giữa các phần tử dọc theo trục ngang */
            margin: 0 1.5rem; /* Khoảng cách từ lề trái và phải */
            padding-top: 100px; /* Khoảng cách từ trên */
            margin: 0px 340px;
        }

        /* Căn chỉnh lại h1 */
        .menu-search-container h1 {
            margin: 0;
            color: var(--gray-color);
        }

        /* Tùy chỉnh form tìm kiếm */
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-form input {
            padding: 0.5rem;
            margin-right: 0.5rem;
        }

        .search-form button {
            padding: 0.5rem 1rem;
        }
                    /* From Uiverse.io by satyamchaudharydev */ 
        /* From uiverse.io by @satyamchaudharydev */
        /* removing default style of button */

        .form button {
        border: none;
        background: none;
        color: #8b8ba7;
        }
        /* styling of whole input container */
        .form {
        --timing: 0.3s;
        --width-of-input: 300px;
        --height-of-input: 40px;
        --border-height: 2px;
        --input-bg: #fff;
        --border-color: #7ED4AD;
        --border-radius: 30px;
        --after-border-radius: 1px;
        position: relative;
        width: var(--width-of-input);
        height: var(--height-of-input);
        display: flex;
        align-items: center;
        padding-inline: 0.8em;
        border-radius: var(--border-radius);
        transition: border-radius 0.5s ease;
        background: var(--input-bg,#fff);
        }
        /* styling of Input */
        .input {
        font-size: 0.9rem;
        background-color: transparent;
        width: 100%;
        height: 100%;
        padding-inline: 0.5em;
        padding-block: 0.7em;
        border: none;
        }
        /* styling of animated border */
        .form:before {
        content: "";
        position: absolute;
        background: var(--border-color);
        transform: scaleX(0);
        transform-origin: center;
        width: 100%;
        height: var(--border-height);
        left: 0;
        bottom: 0;
        border-radius: 1px;
        transition: transform var(--timing) ease;
        }
        /* Hover on Input */
        .form:focus-within {
        border-radius: var(--after-border-radius);
        }

        input:focus {
        outline: none;
        }
        /* here is code of animated border */
        .form:focus-within:before {
        transform: scale(1);
        }
        /* styling of close button */
        /* == you can click the close button to remove text == */
        .reset {
        border: none;
        background: none;
        opacity: 0;
        visibility: hidden;
        }
        /* close button shown when typing */
        input:not(:placeholder-shown) ~ .reset {
        opacity: 1;
        visibility: visible;
        }
        /* sizing svg icons */
        .form svg {
        width: 17px;
        margin-top: 3px;
        }
        /* Tăng độ sáng cho các tùy chọn trong dropdown */
        select.input {
            background-color: #7ED4AD; /* Màu nền sáng hơn cho dropdown */
            border: 1px solid #ddd; /* Đường viền mờ */
            transition: background-color 0.3s ease, border 0.3s ease; /* Hiệu ứng chuyển màu nền và viền */
        }

        /* Khi hover vào dropdown */
        select.input:hover {
            background-color: #f2f2f2; /* Màu nền sáng hơn khi hover */
            border-color: #7ED4AD; /* Màu viền sáng hơn */
        }

        /* Khi chọn giá trị trong dropdown */
        select.input:focus {
            background-color: #e8f5e9; /* Màu nền khi focus */
            border-color: #4caf50; /* Màu viền khi focus */
        }
        /*=============== BREAKPOINTS ===============*/
        /* For small devices */
        @media screen and (max-width: 300px) {
        .container {
            margin-inline: 1rem;
        }

        .card__container {
            grid-template-columns: 1fr;
        }
        }

        /* For large devices */
        @media screen and (min-width: 1120px) {
        .container {
            height: 100vh;
            display: grid;
            align-items: center;
        }

        .card__img {
            width: 220px;
        }
        }
    </style>
</head>
<body>
    @include('layouts.header')
    <div class="menu-search-container">
        <h1>Menu</h1>
        <form class="form" action="{{ route('product.search') }}" method="GET">
            <input class="input" placeholder="Search" type="text" name="search" value="{{ request('search') }}">
            
            <!-- Dropdown chọn sắp xếp -->
            <select name="sort" class="input" onchange="this.form.submit()">
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>A-Z Names</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Z-A Names</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
            </select>

            <button class="reset" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </form>
    </div>

    <div class="product-menu">
        @if($products->isEmpty())
            <p>Không có sản phẩm nào phù hợp với tìm kiếm của bạn.</p>
        @else
            <div class="card__container">
                @foreach($products as $product)
                    <article class="card__article">
                        <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}" class="card__img">
                        <div class="card__data">
                            <h3 class="card__title">{{ $product->name }}</h3>
                            <span class="card__price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</span>
                        </div>
                        <img src="{{ asset('images/bg-starbuck.jpg') }}" alt="image" class="card__bg">
                        <a href="{{ route('product.show', ['product_id' => $product->product_id]) }}" class="card__button">See More <i class="ri-arrow-right-line"></i></a>
                    </article>
                @endforeach
            </div>
            <div class="pagination">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</body>
</html>
