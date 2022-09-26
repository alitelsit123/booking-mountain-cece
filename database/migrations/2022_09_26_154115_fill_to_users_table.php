<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('phone')->nullable();
          $table->string('age')->nullable();
          $table->string('weight')->nullable();
          $table->string('country')->nullable();
          $table->string('province')->nullable();
          $table->string('city')->nullable();
          $table->string('region')->nullable();
          $table->string('place')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['phone','age','weight','country','province','city','region','place']);
        });
    }
}
