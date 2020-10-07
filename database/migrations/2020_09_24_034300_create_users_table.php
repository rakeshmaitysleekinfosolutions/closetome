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
            $table->id('user_id');
            $table->string('firstname', 100)->nullable()->default('text');
            $table->string('lastname', 100)->nullable()->default('text');
            $table->string('profile_name', 100)->nullable()->default('text');
            $table->string('email', 100)->nullable()->default('text')->unique();
            $table->string('raw_email', 100)->nullable()->default('text');
            $table->string('mobile', 100)->nullable()->default('text');
            $table->string('password', 100)->nullable()->default('text');
            $table->string('raw_password', 100)->nullable()->default('text');
            $table->string('image', 100)->nullable()->default('text');
            $table->string('street_no', 20)->nullable()->default('text');
            $table->string('street', 100)->nullable()->default('text');
            $table->string('country', 100)->nullable()->default('text');
            $table->string('city', 100)->nullable()->default('text');
            $table->string('postal_code', 20)->nullable()->default('text');
            $table->integer('is_blocked')->unsigned()->nullable()->default(12);
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
