<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->enum('species', ['dog', 'cat']);
            $table->enum('gender', ['male', 'female']);
            $table->string('breed');
            $table->string('color');
            $table->integer('age');
            $table->float('weight',4,2);
            $table->enum('neutered', ['yes', 'no']);
            $table->mediumText('previous_problems')->nullable();
            $table->mediumText('drug_allergies')->nullable();
            $table->mediumText('current_diet')->nullable();
            $table->mediumText('current_medication')->nullable();
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
        Schema::dropIfExists('pets');
    }
}
