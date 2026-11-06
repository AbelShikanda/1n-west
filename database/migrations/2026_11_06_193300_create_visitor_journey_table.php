<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorJourneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_journeys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_data_id')->nullable();
            $table->string('page_url');
            $table->string('event_type');
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();

            $table->foreign('visitor_data_id')->references('id')->on('visitor_data')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_journeys');
    }
}
