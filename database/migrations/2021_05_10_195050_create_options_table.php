<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Option;
class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("code");
            $table->timestamps();
        });
        Option::create(["nom"=>"Wifi","code"=>"fas fa-wifi"]);
        Option::create(["nom"=>"Parking","code"=>"fas fa-parking"]);
        Option::create(["nom"=>"Animaux","code"=>"fas fa-dog"]);
        Option::create(["nom"=>"Pas Fumer","code"=>"fas fa-smoking-ban"]);
        Option::create(["nom"=>"Plage","code"=>"fas fa-umbrella-beach"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
