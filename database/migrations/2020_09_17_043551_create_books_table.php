<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('book_name')->nullable();
            $table->string('book_description')->nullable();
            $table->string('genre_id')->nullable();
            $table->string('book_author')->nullable();
            $table->string('book_publisher')->nullable();
            $table->string('date_published')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('book_quantity');   
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
        Schema::dropIfExists('books');
    }
}
