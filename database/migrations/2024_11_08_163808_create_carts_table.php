<?php

// Migration tạo bảng carts
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // ID của bản ghi trong bảng cart_items
            $table->unsignedBigInteger('cart_id'); // Khóa ngoại tới bảng carts
            $table->unsignedBigInteger('product_id'); // Khóa ngoại tới bảng products
            $table->unsignedBigInteger('product_detail_id'); // Khóa ngoại tới bảng product_details
            $table->integer('quantity')->default(1); // Số lượng sản phẩm
            $table->timestamps();
    
            // Khóa ngoại tới bảng carts
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            // Khóa ngoại tới bảng products
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            // Khóa ngoại tới bảng product_details
            $table->foreign('product_detail_id')->references('detail_id')->on('product_details')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

