<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('idnumber');
			$table->string('firstname');
			$table->string('middlename');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->date('birthdate');
			$table->string('contact');
			$table->string('address');
			$table->enum('personnel_type', ['teacher', 'counselor', 'librarian', 'healthcare', 'principal', 'admin']);
			$table->enum('gender',['female','male']);
			$table->string('password');
            $table->enum('deleted',['0','1'])->default('0');
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
