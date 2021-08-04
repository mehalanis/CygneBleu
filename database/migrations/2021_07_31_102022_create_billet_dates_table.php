<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billet_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billet_id')->constrained()->onDelete('cascade');
            $table->dateTime("depart");
            $table->dateTime('retour');
            $table->integer("type");
            $table->integer("class");
            $table->double("prix");
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
        Schema::dropIfExists('billet_dates');
    }
}
