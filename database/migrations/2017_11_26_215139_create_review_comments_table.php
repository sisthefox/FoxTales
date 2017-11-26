<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');            
            $table->unsignedInteger('review_id')->nullable();
			$table->unsignedInteger('user_id')->nullable();  
            $table->timestamps();

            $table->foreign('review_id')->references('id')->on('reviews')->on_update('cascade')->on_delete('cascade');
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
        Schema::dropIfExists('review_comments');
    }
}
