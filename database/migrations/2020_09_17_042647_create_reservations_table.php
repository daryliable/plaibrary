<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lib_id');
            $table->string('lib_name')->nullable();
            $table->integer('book_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('book_name')->nullable();
            $table->string('student_name')->nullable();
            $table->string('college')->nullable();
            $table->string('status')->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
