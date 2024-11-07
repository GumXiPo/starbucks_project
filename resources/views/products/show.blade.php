<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Chi Tiết Sản Phẩm</title>
</head>
<body>
    @include('layouts.header')

    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
            <img class="w-full" alt="image of a girl posing" src="{{ asset('images/product/' . $product->image) }}" />
            <img class="mt-6 w-full" alt="image of a girl posing" src="{{ asset('images/product/' . $product->image_two) }}" />
        </div>
        <div class="md:hidden">
            <img class="w-full" alt="image of a girl posing" src="{{ asset('images/product/' . $product->image) }}" />
            <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="{{ asset('images/product/' . $product->image_tag_one) }}" />
                <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="{{ asset('images/product/' . $product->image_tag_two) }}" />
                <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="{{ asset('images/product/' . $product->image_tag_three) }}" />
                <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="{{ asset('images/product/' . $product->image_tag_four) }}" />
            </div>
        </div>

        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <!-- Product details here -->

            <!-- Toggle Shipping and Returns section -->
            <div class="border-t border-b py-4 mt-7 border-gray-200">
                <div data-menu class="flex justify-between items-center cursor-pointer">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Shipping and returns</p>
                    <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                        <img class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                        <img class="transform hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg" alt="dropdown">
                    </button>
                </div>
                <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect-shipping">You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are nonrefundable</div>
            </div>

            <!-- Toggle Contact Us section -->
            <div class="border-b py-4 border-gray-200">
                <div data-menu class="flex justify-between items-center cursor-pointer">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Contact us</p>
                    <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                        <img class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                        <img class="transform hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg" alt="dropdown">
                    </button>
                </div>
                <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect-contact">If you have any questions on how to return your item to us, contact us.</div>
            </div>
        </div>
    </div>

    <script>
        // Lấy tất cả các phần tử có data-menu
        let elements = document.querySelectorAll("[data-menu]");

        // Duyệt qua từng phần tử để thêm sự kiện click
        elements.forEach(function(element) {
            element.addEventListener("click", function () {
                let section = element.nextElementSibling; // Lấy phần tử chứa nội dung
                let indicator = element.querySelector("img"); // Lấy hình ảnh indicator

                // Tìm phần tử "sect" và ẩn hoặc hiển thị
                section.classList.toggle("hidden");
                
                // Xoay biểu tượng của dropdown
                indicator.classList.toggle("rotate-180");
            });
        });
    </script>
</body>
</html>
