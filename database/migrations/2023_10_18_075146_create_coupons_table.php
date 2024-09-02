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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('Serial',50);
            $table->integer('UsedLimit');
            $table->integer('UsedCount')->default(0);
            $table->decimal('FixedDiscount',12,2)->nullable();
            $table->integer('RelativeDiscount')->nullable();
            $table->dateTime('Expiration');
            $table->string('blob',150);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
