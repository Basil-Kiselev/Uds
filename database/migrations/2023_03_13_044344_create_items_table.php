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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('uds_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('node_id')->nullable();
            $table->string('external_id')->nullable();
            $table->string('type')->nullable();
            $table->string('sku')->nullable();
            $table->float('price')->nullable();
            $table->string('description')->nullable();
            $table->string('offer')->nullable();
            $table->string('inventory')->nullable();
            $table->string('photos')->nullable();
            $table->string('measurement')->nullable();
            $table->float('increment')->nullable();
            $table->float('min_quantity')->nullable();
            $table->boolean('hidden')->nullable();
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
        Schema::dropIfExists('items');
    }
};
