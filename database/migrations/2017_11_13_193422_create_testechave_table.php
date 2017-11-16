<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestechaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testechave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_title');
            $table->text('description');
            $table->string('author');
            $table->string('publishing_company');
            $table->string('book_image');
            $table->integer('user_id')->unsigned()->index();          
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->on_update('cascade')->on_delete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testechave');
    }
}
