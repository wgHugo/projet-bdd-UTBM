<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->string('title', 100);
            $table->string('content', 500);
            $table->float('mark');
   			$table->integer('product_id')->unsigned();

$table->foreign('product_id')
				  ->references('id')
				  ->on('products')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
				  			$table->integer('user_id')->unsigned();

$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
	      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
