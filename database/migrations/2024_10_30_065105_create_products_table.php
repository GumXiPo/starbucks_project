<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('product_id');                   // Mã sản phẩm, tự động tăng
            $table->string('name', 100);                // Tên sản phẩm
            $table->string('image', 250);               //hình
            $table->text('description')->nullable();    // Mô tả chi tiết sản phẩm (nullable)
            $table->decimal('price', 10, 2);            // Giá sản phẩm
            $table->string('category', 50);             // Danh mục sản phẩm
            $table->boolean('is_available')->default(true); // Trạng thái còn hàng, mặc định là TRUE
            $table->integer('stock_quantity')->default(0);  // Số lượng tồn kho, mặc định là 0
            $table->string('supplier', 100)->nullable();    // Nhà cung cấp, có thể để trống
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
