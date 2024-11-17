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
            if (!Schema::hasColumn('orders', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('orders', 'email')) {
                $table->string('email', 255)->nullable();
            }
            if (!Schema::hasColumn('orders', 'user_id')) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
