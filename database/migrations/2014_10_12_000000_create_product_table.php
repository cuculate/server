<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(' product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('age_id');
            $table->string('price');
            $table->string('image');
            $table->string('old_price');
            $table->tinyInteger('sale');
            $table->tinyInteger('new');
            $table->integer('stocked');
            $table->integer('solded');
            $table->string('information');
            $table->string('made_id');
            $table->string('material');
            $table->string('color');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->tinyInteger('status');
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
        Schema::dropIfExists(' product');
    }
}
