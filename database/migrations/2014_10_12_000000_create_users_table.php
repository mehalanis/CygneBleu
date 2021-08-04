<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('droit');
            $table->integer("state");
            $table->integer("budget")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("12345678"),
            "droit"=>"0",
            "state"=>"1"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
