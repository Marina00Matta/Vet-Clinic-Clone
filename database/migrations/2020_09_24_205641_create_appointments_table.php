<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            // $table->boolean('Saturday')->default(0)->nullable();
            // $table->boolean('Sunday')->nullable();
            // $table->boolean('Monday')->nullable();
            // $table->boolean('Tuesday')->nullable();
            // $table->boolean('Wednesday')->nullable();
            // $table->boolean('Thursday')->nullable();
            // $table->boolean('Friday')->nullable();
            $table->date('date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('appointments');
    }
}
