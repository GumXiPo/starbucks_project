<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Thêm cột order_id
            $table->unsignedBigInteger('product_id'); // Thêm cột product_id
            
            // Tạo khóa ngoại liên kết với bảng orders và products
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');

            $table->integer('quantity'); // Số lượng sản phẩm trong đơn hàng
            $table->decimal('price_at_purchase', 10, 2); // Giá sản phẩm tại thời điểm mua
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
