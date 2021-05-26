<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->integer('nb_chambre')->default(0);
            $table->integer('nb_Adulte')->default(0);
            $table->integer('nb_Adolescente')->default(0);
            $table->integer('nb_Enfant')->default(0);
            $table->double("total")->default(0);
            $table->integer("is_paid")->default(-1);
            $table->double("versements")->default(0);
            $table->double("reduction")->default(0);
            $table->date("debut");
            $table->date("fin");
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
        Schema::dropIfExists('hotel_reservations');
    }
}
