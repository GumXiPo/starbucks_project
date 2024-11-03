<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id('detail_id');                      // Mã chi tiết sản phẩm, tự động tăng
            $table->unsignedBigInteger('product_id');     // Khóa ngoại tới bảng products
            $table->text('ingredients')->nullable();      // Thành phần (nullable)
            $table->string('size', 50)->nullable();       // Kích thước sản phẩm (nullable)
            $table->string('color', 50)->nullable();      // Màu sắc sản phẩm (nullable)
            $table->text('additional_info')->nullable();  // Thông tin bổ sung (nullable)
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade'); // Khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
