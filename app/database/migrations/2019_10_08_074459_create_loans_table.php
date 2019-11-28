<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
			$table->integer('product_id')->unsigned();
            $table->foreign('product_id')
				  ->references('id')
				  ->on('products')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
		    $table->timestamp('returned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
