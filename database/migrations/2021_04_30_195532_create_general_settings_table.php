<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\GeneralSetting;
class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string("Telephone_1")->nullable();
            $table->string("Telephone_2")->nullable();
            $table->string("Fix")->nullable();
            $table->string("Email")->nullable();
            $table->string("Adresse")->nullable();
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("youtube")->nullable();
            $table->timestamps();
        });
        $GeneralSetting=GeneralSetting::create(
            ["Telephone_1"=>"0550 053 574",
            "Telephone_2"=>"0550 053 514",
            "Fix"=>"023 834 265",
            "Email"=>"cygnebleu.bahri@gmail.com",
            "Adresse"=>"coopérative familiale n°95 brise marine, Bordj El Bahri 16046 Bordj El Bahri, Algérie",
            "facebook"=>"https://www.facebook.com/cygnebleuavt"]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
