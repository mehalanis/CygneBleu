<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyageOrganiseReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyage_organise_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voyage_organise_date_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained();
            $table->integer("is_paid")->default(-1);
            $table->double("versements")->default(0);
            $table->integer('nb_Adulte')->default(0);
            $table->integer('nb_Adolescente')->default(0);
            $table->integer('nb_Enfant')->default(0);
            $table->double("reduction")->default(0);
            $table->integer("paiement_type");
            $table->string("paiment_photo")->nullable();
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
        Schema::dropIfExists('voyage_organise_reservations');
    }
}
