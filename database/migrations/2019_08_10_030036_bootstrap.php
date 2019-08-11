<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bootstrap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::create('platforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInt('contact_id')->index();
            $table->string('line_1');
            $table->string('line_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip');
            $table->timestamps();
        });

        Schema::create('identity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->bigInt('contact_id')->index();
            $table->bigInt('platform_id')->index();
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('platforms');
        Schema::dropIfExists('idenity');
    }
}
