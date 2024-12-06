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
        Schema::create('cmspages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('order');
            $table->string('status');
            $table->longText('content');
            $table->longText('metatitle');
            $table->longText('metadescription');
            $table->longText('metakeywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmspages');
    }
};
