<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('select_type');
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('description')->nullable();
            $table->string('man_date')->nullable();
            $table->string('ex_date')->nullable();
            $table->string('stock')->nullable();
            $table->string('entry_date')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
