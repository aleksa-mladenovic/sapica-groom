<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->bigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->float('original_price');
            $table->float('selling_price');
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_descrip');
            $table->mediumText('meta_keywords');
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
};
