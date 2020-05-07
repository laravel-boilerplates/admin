<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->string('label');
            $table->text('description')->nullable();
        });

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->string('label');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');
        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->dropColumn(['label', 'description']);
        });
        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->dropColumn(['label', 'description']);
        });
    }
}
