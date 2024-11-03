<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');                  // Mã chi tiết đơn hàng, tự động tăng
            $table->unsignedBigInteger('order_id');       // Khóa ngoại tới bảng orders
            $table->unsignedBigInteger('product_id');     // Khóa ngoại tới bảng products
            $table->integer('quantity');                  // Số lượng sản phẩm
            $table->decimal('price', 10, 2);              // Giá sản phẩm
            $table->foreign('order_id')->references('order_id')->on('orders'); // Khóa ngoại
            $table->foreign('product_id')->references('product_id')->on('products'); // Khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
