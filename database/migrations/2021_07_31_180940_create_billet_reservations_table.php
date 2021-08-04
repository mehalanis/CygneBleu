<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billet_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billet_date_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained();
            $table->integer("is_paid")->default(-1);
            $table->double("versements")->default(0);
            $table->double("reduction")->default(0);
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
        Schema::dropIfExists('billet_reservations');
    }
}
