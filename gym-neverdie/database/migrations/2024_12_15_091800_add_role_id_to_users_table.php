<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable();  // Menambahkan kolom role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');  // Menambahkan foreign key yang merujuk ke tabel roles
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
            $table->dropForeign(['role_id']);  // Menghapus constraint foreign key
            $table->dropColumn('role_id');  // Menghapus kolom role_id
        });
    }
}
