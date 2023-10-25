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
        Schema::create('scheduletimeranges', function (Blueprint $table) {
            $table->id();
            $table->time('start_time', $precision = 0);
            $table->time('end_time', $precision = 0);
            $table->string('date');
            $table->unsignedBigInteger('availabilties_id');
            $table->foreign('availabilties_id')->references('id')->on('availabilties')->cascadeOnDelete();
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
        Schema::dropIfExists('scheduletimeranges');
    }
};
