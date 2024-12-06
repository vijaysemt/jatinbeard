<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('cate_id');
            $table->string('name');
            $table->string('order');
            $table->text('description')->nullable();
            $table->longText('fdescription')->nullable();
            $table->string('price',);
            $table->string('oprice',);
            $table->integer('stock')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('pcover');
            $table->string('pimage');
            $table->longText('metatitle');
            $table->longText('metadescription');
            $table->longText('metakeywords');
            $table->longText('seohead');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
