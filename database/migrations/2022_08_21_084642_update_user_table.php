<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('name')->comment('ชื่อผู้ใช้งาน')->change();
            $table->string('email')->comment('อีเมล์ผู้ใช้งาน')->change();
            $table->string('password')->comment('รหัสผ่านผู้ใช้งาน')->change();
            // $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('name')->change();
            $table->string('email')->change();
            $table->string('password')->change();
            // $table->softDeletes();
        });
    }
}
