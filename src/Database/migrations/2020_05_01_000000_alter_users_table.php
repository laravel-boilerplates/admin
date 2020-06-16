<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userClass = config('auth.providers.users.model');
        $usersTable = (new $userClass)->getTable();

        Schema::table($usersTable, function (Blueprint $table) {
            $table->uuid('uuid');
            $table->string('title')->nullable();
            $table->string('socialite_driver')->nullable();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $userClass = config('auth.providers.users.model');
      $usersTable = (new $userClass)->getTable();

      Schema::table($usersTable, function (Blueprint $table) {
            $table->dropColumn(['uuid', 'title', 'socialite_driver']);
            $table->string('password')->change();
        });
    }
}
