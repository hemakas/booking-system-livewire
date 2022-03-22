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
            $table->integer('no_of_rooms');
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->integer('no_of_adults');
            $table->integer('no_of_children');
            $table->date('booking_date')->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 200);
            $table->string('contact_mobile');
            $table->string('contact_email');
            $table->float('total_amount', 8, 2);
            $table->text('comment');
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
