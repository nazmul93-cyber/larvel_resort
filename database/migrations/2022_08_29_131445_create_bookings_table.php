<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resort_id')->constrained()->cascadeOnDelete();
            $table->date('check_in');
            $table->date('check_out');
            // $table->integer('room_numbers');
            $table->integer('room_no');
            $table->string('visitor_email');
            $table->integer('visitor_numbers');
            $table->enum('bill', ['paid','due']);
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
        Schema::dropIfExists('bookings');
    }
}
