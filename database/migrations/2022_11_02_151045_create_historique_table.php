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
        Schema::create('historique', function (Blueprint $table) {
            $table->id();
            /* $table->string('username');
            $table->string('wireName');
            $table->string('location');
            $table->string('serialNumber'); */
            $table->string('username');
            $table->string('search');
            $table->string('password');
            $table->string('password_confirmation');
            $table->string('serie');
            $table->integer('quantite')->default(50);
            $table->date('dateOperation')->default(DB::raw('NOW()'));
            $table->integer('post');

            // $table->foreign('username')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('historique');
    }
};
