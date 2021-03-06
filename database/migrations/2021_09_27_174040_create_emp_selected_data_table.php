<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpSelectedDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_selected_data', function (Blueprint $table) {
            $table->id();
            $table->string('selectedData');
            $table->string('emp_id');
            $table->string('userName');
            $table->string('floor');
            $table->string('room');
            $table->string('bedNumber');
            $table->string('designation');
            $table->string('phone');
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
        Schema::dropIfExists('emp_selected_data');
    }
}
