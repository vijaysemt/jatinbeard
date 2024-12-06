<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('order');
            $table->tinyInteger('status')->default('0');
            $table->longText('shortdescription');
            $table->longText('fulldescription');
            $table->longText('metatitle');
            $table->longText('metadescription');
            $table->longText('metakeywords');
            $table->string('cover');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorys');
    }
};
