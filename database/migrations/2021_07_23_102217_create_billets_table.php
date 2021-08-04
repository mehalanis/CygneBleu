<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ville_depart_id');
            $table->foreign('ville_depart_id')->references('id')->on('villes')->onDelete('cascade');
            $table->unsignedBigInteger('ville_arrivee_id');
            $table->foreign('ville_arrivee_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string("photo")->nullable();
            $table->integer("type");
            $table->integer("state")->default(1);
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
        Schema::dropIfExists('billets');
    }
}
