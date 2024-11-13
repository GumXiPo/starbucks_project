<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Thêm cột email nếu chưa có
            if (!Schema::hasColumn('orders', 'email')) {
                $table->string('email')->nullable();
            } else {
                // Nếu cột email đã tồn tại thì chỉ cần thay đổi thuộc tính nullable
                $table->string('email')->nullable()->change();
            }
        });
    }
public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('email')->nullable(false)->change();
    });
}

};
