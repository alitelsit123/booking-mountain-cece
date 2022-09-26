<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_members', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('phone');
          $table->string('email');
          $table->string('nik');
          $table->string('age');
          $table->string('weight');
          $table->string('country');
          $table->string('province');
          $table->string('city');
          $table->string('region');
          $table->string('place');
          $table->string('role');
          $table->unsignedBigInteger('book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_members');
    }
}
