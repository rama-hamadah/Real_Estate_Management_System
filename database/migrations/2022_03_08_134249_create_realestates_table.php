<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('city');
            $table->integer('floor');
            $table->integer('area');
            $table->double('price');
            $table->integer('number_of_rooms');
            $table->integer('number_of_path_rooms');
            $table->boolean('is_sales')->default(0);
            $table->boolean('is_rent')->default(0);
            $table->enum('state' , ["sale" , "rent" ])->default('sale');
            $table->enum('type' , ["tabo" , "court" ])->default('tabo');
            $table->enum('property_type', ["villa" , "flat","land","shop" ])->default('flat');
            $table->string('image');
            $table->timestamps();


            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestates');
    }
}
