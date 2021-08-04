<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ville;
class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pays_id')->constrained();
            $table->string("nom");
            $table->timestamps();
        });
        ville::create(["pays_id"=>1,"nom"=>"Adrar"]);   
        ville::create(["pays_id"=>2,"nom"=>"Paris"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
