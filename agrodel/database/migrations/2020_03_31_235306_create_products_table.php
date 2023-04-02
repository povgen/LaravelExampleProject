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
            $table->bigIncrements('id');

            $table->string('title');
            $table->string('slug')->unique();
            $table->bigInteger('category_id')->unsigned();

            $table->text('description')->nullable();
            $table->string('vendor_code', 20)->unique();
            $table->string('image_url')->default('https://via.placeholder.com/200x160?text=%D0%9D%D0%B5%D1%82+%D1%84%D0%BE%D1%82%D0%BE');

            $table->float('price');
            $table->boolean('availabl')->default(false);


            $table->timestamps();

            $table->softDeletes();
         
            $table->foreign('category_id')->references('id')->on('product_categories');
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
