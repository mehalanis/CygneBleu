<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyageOrganisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyage_organises', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("Nb_jour");
            $table->longText("description");
            $table->string("photo");
            $table->double("prixAdulte");
            $table->double("prixAdolescente");
            $table->double("prixEnfant"); 
            $table->foreignId('ville_id')->constrained();
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
        Schema::dropIfExists('voyage_organises');
    }
}
