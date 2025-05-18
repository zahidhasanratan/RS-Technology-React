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
        Schema::create('pakcage_pricing_models', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('sub_title');
            $table->integer('price');
            $table->text('field1');
            $table->text('field2');
            $table->text('field3');
            $table->text('field4');
            $table->text('field5');
            $table->text('field6');
            $table->text('field7');
            $table->text('field8');
            $table->text('field9');
            $table->text('field10');
            $table->text('bottomText');
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
        Schema::dropIfExists('pakcage_pricing_models');
    }
};
