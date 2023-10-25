<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mon')->default('0');
            $table->string('tue')->default('0');
            $table->string('wed')->default('0');
            $table->string('thu')->default('0');
            $table->string('fri')->default('0');
            $table->string('sat')->default('0');
            $table->string('sun')->default('0');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availabilties');
    }
};
