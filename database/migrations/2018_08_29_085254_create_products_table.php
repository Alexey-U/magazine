<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            
            $table->string('name', 255);
            $table->integer('category_id');
            $table->integer('code');
            $table->float('price');
            $table->integer('availability');
            $table->string('brand', 255);
            $table->string('image', 255);
            $table->text('description');
            $table->integer('is_new');
            $table->integer('is_recommended');
            $table->integer('status');

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
        Schema::dropIfExists('products');
    }
}
