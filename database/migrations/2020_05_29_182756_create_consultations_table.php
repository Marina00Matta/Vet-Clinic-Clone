<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            // $table->unsignedBigInteger('reservation_id');
            $table->mediumText('presenting_signs')->nullable();
            $table->mediumText('frequency_and_duration')->nullable();
            $table->mediumText('appetite')->nullable();
            $table->mediumText('drinking')->nullable();
            $table->mediumText('urination')->nullable();
            $table->mediumText('bowel')->nullable();
            $table->mediumText('vomiting')->nullable();
            $table->mediumText('attitude')->nullable();
            $table->mediumText('coughing')->nullable();
            $table->mediumText('sneezing')->nullable();
            $table->mediumText('HR')->nullable();
            $table->mediumText('RR')->nullable();
            $table->mediumText('CRT')->nullable();
            $table->mediumText('WT')->nullable();
            $table->mediumText('eyes')->nullable();
            $table->mediumText('ears')->nullable();
            $table->mediumText('mouth')->nullable();
            $table->mediumText('lung_sounds')->nullable();
            $table->mediumText('heart_sounds')->nullable();
            $table->mediumText('neuro')->nullable();
            $table->mediumText('abdomen')->nullable();
            $table->mediumText('skin')->nullable();
            $table->mediumText('skeletal')->nullable();
            $table->mediumText('DDx')->nullable();
            $table->mediumText('tests')->nullable();
            // $table->mediumText('treatment')->nullable();
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
        Schema::dropIfExists('consultations');
    }
}
