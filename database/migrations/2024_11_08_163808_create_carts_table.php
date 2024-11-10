<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_carts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();                                  // ID của giỏ hàng
            $table->unsignedBigInteger('user_id');         // ID người dùng
            $table->unsignedBigInteger('product_id');      // ID sản phẩm
            $table->integer('quantity')->default(1);       // Số lượng sản phẩm
            $table->string('size')->nullable();            // Kích thước sản phẩm (nullable để có thể trống)
            $table->timestamps();                          // Thời gian tạo và cập nhật
    
            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

