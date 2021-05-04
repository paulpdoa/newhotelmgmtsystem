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
            $table->id('booking_id');
            $table->integer('customer_id');
            $table->date('date_booking_made');
            $table->time('time_booking_made');
            $table->date('booked_start_date');
            $table->date('booked_end_date');
            $table->date('total_payment_due_date');
            $table->decimal('total_payment_due_amount');
            $table->decimal('total_payment_made_on');
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
