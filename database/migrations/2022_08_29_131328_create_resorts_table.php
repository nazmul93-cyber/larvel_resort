<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resorts', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('title');
            $table->string('location');
            $table->longText('description');
            $table->string('tags');
            $table->string('company');
            $table->string('website');
            $table->string('email');
            $table->dateTime('available_from');
            $table->dateTime('available_till');
            $table->integer('room_numbers');
            $table->float('room_price');
            $table->integer('room_capacity');
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
        Schema::dropIfExists('resorts');
    }
}
