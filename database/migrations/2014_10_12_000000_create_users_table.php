<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->nullable();
            $table->string('phone',15)->nullable();
            $table->tinyInteger('sex')->default(1);
            $table->boolean('active')->nullable();
            $table->integer('assignment_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('avatar',255)->nullable();
            $table->integer('signature_file')->nullable();
            $table->boolean('signature_sms')->default(0);
            $table->boolean('signature_email')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
};
