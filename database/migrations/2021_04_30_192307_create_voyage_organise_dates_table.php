<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyageOrganiseDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyage_organise_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voyage_organise_id')->constrained()->onDelete('cascade');
            $table->date("depart");
            $table->date('retour');
            $table->integer("max_personne");
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
        Schema::dropIfExists('voyage_organise_dates');
    }
}
