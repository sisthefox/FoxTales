<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_title');
            $table->text('description');
            $table->string('author');
            $table->string('publishing_company');
            $table->string('book_image');
            $table->float('sale_price');
            $table->unsignedInteger('user_id')->nullable();    
            
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
        Schema::dropIfExists('sales');
    }
}
