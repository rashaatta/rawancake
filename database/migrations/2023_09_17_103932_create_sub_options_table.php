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
        Schema::create('sub_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('OptID');
            $table->string('Name',150);
            $table->string('NameEN',150);
            $table->tinyInteger('Available');
            $table->string('blob',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_options');
    }
};
