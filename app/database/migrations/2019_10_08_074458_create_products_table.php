<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->string('name',100);
            $table->string('author',100);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
				  ->references('id')
				  ->on('categories')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
			$table->integer('type_id')->unsigned();
            $table->foreign('type_id')
				  ->references('id')
				  ->on('categories')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
