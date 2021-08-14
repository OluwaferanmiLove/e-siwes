<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('email', 225)->unique();
            $table->string('unique', 225)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('supervisor_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->enum('role', ['Admin', 'Supervisor', 'Student']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
