<?php

use LaravelBoilerplates\Admin;
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
        $usersTable = Admin::users()->getTable();

        Schema::table($usersTable, function (Blueprint $table) {
            $table->uuid('uuid');
            $table->text('socialite_driver')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $usersTable = Admin::users()->getTable();

      Schema::table($usersTable, function (Blueprint $table) {
            $table->dropColumn(['uuid', 'socialite_driver']);
        });
    }
}
