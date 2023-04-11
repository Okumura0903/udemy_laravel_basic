<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_shop', function (Blueprint $table) {
            $table->foreignId('route_id');
            $table->foreignId('shop_id');
            $table->primary(['route_id','shop_id']);//idを消す場合は別で主キーを設定
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_shop');
    }
};
