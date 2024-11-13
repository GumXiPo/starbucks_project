<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Thêm cột 'products' để lưu thông tin các sản phẩm dưới dạng JSON
            $table->json('products')->nullable(); // Cột này sẽ lưu thông tin sản phẩm dưới dạng JSON
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('products');
        });
    }
}
