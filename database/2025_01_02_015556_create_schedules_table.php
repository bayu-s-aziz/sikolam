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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->string('name');
            $table->time('on_time')->nullable(); // Waktu untuk menyalakan
            $table->time('off_time')->nullable(); // Waktu untuk mematikan
            $table->boolean('is_active')->default(true); // Status jadwal
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
        Schema::dropIfExists('schedules');
    }
};
