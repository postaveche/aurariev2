<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255);
            $table->string('name_ro', 255);
            $table->string('name_ru', 255);
            $table->string('desc_ro', 255)->nullable();
            $table->string('desc_ru', 255)->nullable();
            $table->string('key_ro', 255)->nullable();
            $table->string('key_ru', 255)->nullable();
            $table->integer('tag_id')->default('0');
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
        Schema::dropIfExists('tags');
    }
}
