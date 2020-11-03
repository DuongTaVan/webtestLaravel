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
            $table->bigIncrements('id');
            $table->string('p_name');
            $table->string('p_slug');
            $table->text('p_desc');
            $table->text('p_content')->nullable();
            $table->decimal('p_price',18,0)->default(0);
            $table->text('p_image')->nullable();
            $table->tinyInteger('p_hot')->default(0);
            $table->tinyInteger('p_status')->default(1);
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('id')->on('trademarks')->onDelete('cascade');
            $table->unsignedBigInteger('c_id');
            $table->foreign('c_id')->references('id')->on('categories')->onDelete('cascade');
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
