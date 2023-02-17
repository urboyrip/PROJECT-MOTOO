<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Aplikasi');
            $table->string('User_Guide');
            $table->string('Technical_Document');
            $table->string('Category');
            $table->string('Login');
            $table->string('Device');
            $table->string('Description');
            $table->string('Platform');
            $table->string('DB_Prod');
            $table->string('DB_Dev');
            $table->string('Server_Dev');
            $table->string('Username_Aplikasi');
            $table->string('Password_Aplikasi');
            $table->string('Enviroment_Aplikasi');
            $table->string('Notes_Aplikasi');
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
        Schema::dropIfExists('applications');
    }
};
