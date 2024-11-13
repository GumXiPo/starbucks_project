<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' làm khóa chính
            $table->unsignedBigInteger('cart_id'); // Khóa ngoại đến bảng carts
            $table->unsignedBigInteger('product_id'); // Khóa ngoại đến bảng products
            $table->integer('quantity')->default(1); // Số lượng sản phẩm trong giỏ
            $table->string('size')->nullable(); // Kích thước sản phẩm (nếu cần)
            $table->decimal('price', 10, 2); // Giá sản phẩm tại thời điểm thêm vào giỏ
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Khóa ngoại đến bảng carts và products
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
