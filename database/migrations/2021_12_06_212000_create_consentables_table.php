<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consentables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consent_option_id');
            $table->unsignedBigInteger('consentable_id');
            $table->string('consentable_type');
            $table->string('key')->default(NULL)->nullable();
            $table->boolean('accepted')->default(0);
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
        Schema::dropIfExists('consentables');
    }
}
