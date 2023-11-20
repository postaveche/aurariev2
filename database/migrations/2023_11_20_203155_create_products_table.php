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
            $table->id();
            $table->string('slug', 255);
            $table->string('name_ro', 255);
            $table->string('name_ru', 255);
            $table->string('desc_ro', 255)->nullable();
            $table->string('desc_ru', 255)->nullable();
            $table->string('key_ro', 255)->nullable();
            $table->string('key_ru', 255)->nullable();
            $table->string('cod', 255);
            $table->integer('category_id');
            $table->integer('price');
            $table->integer('promo_price');
            $table->integer('cantitate');
            $table->string('image_thumb', 255);
            $table->string('images',500)->nullable();
            $table->integer('images_qty');
            $table->text('full_desc_ro')->nullable();
            $table->text('full_desc_ru')->nullable();
            $table->integer('active')->default('0');
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
