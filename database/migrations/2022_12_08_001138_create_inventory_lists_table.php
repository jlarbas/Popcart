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
        Schema::create('inventory_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('inventory_id');
            $table->string('item_name');
            $table->integer('quantity')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->string('measurement')->nullable();
            $table->string('item_code')->nullable();
            $table->integer('quantity_used')->nullable();
            $table->date('date_consumed')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('inventory_lists');
    }
};
