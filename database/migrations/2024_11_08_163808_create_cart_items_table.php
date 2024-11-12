<?php
// Migration tạo bảng cart_items
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('cart_item_id');
            $table->unsignedBigInteger('cart_id'); // Khóa ngoại tới bảng carts
            $table->unsignedBigInteger('product_id'); // Khóa ngoại tới bảng products
            $table->unsignedBigInteger('product_detail_id'); // Khóa ngoại tới bảng product_details
            $table->integer('quantity')->default(1); // Số lượng sản phẩm trong giỏ hàng
            $table->foreign('cart_id')->references('cart_id')->on('carts')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('detail_id')->on('product_details')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}