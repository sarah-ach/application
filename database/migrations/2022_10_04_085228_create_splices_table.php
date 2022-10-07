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
        Schema::create('splices', function (Blueprint $table) {
            $table->id();
            $table->string('wire_name');
            $table->string('CSA');
            $table->string('color1');
            $table->string('color2');
            $table->integer('length');
            $table->string('terminal_A');
            $table->string('seal_A');
            $table->string('joint_to_A');
            $table->string('cavity_A');
            $table->string('terminal_B');
            $table->string('seal_B');
            $table->string('joint_to_B');
            $table->string('cavity_B');
            $table->string('bundle_size');
            $table->string('kanban_location');
            $table->string('workstation');
            $table->string('location');
            $table->string('module');
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
        Schema::dropIfExists('splices');
    }
};
