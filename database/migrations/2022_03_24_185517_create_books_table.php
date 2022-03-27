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
        DB::statement('set foreign_key_checks=0');

        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('name');
            $table->string('isbn');
            $table->string('number_of_pages');
            $table->string('publisher');
            $table->string('country');
            $table->string('media_type');
            $table->string('released');
            $table->timestamps();


            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');

            // $table->bigInteger('comment_id')->unsigned();
            // $table->foreign('comment_id')
            //     ->references('id')
            //     ->on('comments')
            //     ->onDelete('cascade');

            // $table->bigInteger('character_id')->unsigned();
            // $table->foreign('character_id')
            //         ->references('id')
            //         ->on('characters')
            //         ->onDelete('cascade');
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
