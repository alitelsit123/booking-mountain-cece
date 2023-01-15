<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableAgeWeight extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_members', function (Blueprint $table) {
            $table->string('age')->nullable()->change();
            $table->string('weight')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_members', function (Blueprint $table) {
            $table->string('age')->change();
            $table->string('weight')->change();
        });
    }
}
