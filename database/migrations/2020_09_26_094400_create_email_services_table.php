<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('driver');
            $table->string('host');
            $table->string('port');
            $table->string('username');
            $table->string('password');
            $table->string('encryption');

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
        Schema::dropIfExists('email_services');
    }
}
