<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained('property_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('types_id')->constrained('property_types')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('price', 10, 2);
            $table->string('name');
            $table->string('slug');
            $table->integer('rooms')->default(1);
            $table->integer('baths')->default(1);
            $table->integer('living_rooms')->default(1);
            $table->integer('kitchens')->default(1);
            $table->string('country');
            $table->string('county');
            $table->string('town');
            $table->text('meta_description');
            $table->string('meta_keywords');
            $table->string('meta_image');
            $table->tinyInteger('parking');
            $table->tinyInteger('whatsapp');
            $table->tinyInteger('telegram');
            $table->tinyInteger('website');
            $table->tinyInteger('promotion');
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
        Schema::dropIfExists('properties');
    }
}
