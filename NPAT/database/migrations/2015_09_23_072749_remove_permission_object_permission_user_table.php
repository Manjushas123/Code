<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePermissionObjectPermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('permission_object_permission_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::create('permission_object_permission_user', function(Blueprint $table) {
            $table->integer('permission_object_id')->unsigned()->index();
            $table->foreign('permission_object_id')->references('id')->on('permission_object')->onDelete('cascade');
            $table->integer('permission_user_id')->unsigned()->index();
            $table->foreign('permission_user_id')->references('id')->on('permission_user')->onDelete('cascade');
        });
    }
}
