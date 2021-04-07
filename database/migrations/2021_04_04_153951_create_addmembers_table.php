<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addmembers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('member_name');
            $table->string('member_phone')->nullable();
            $table->string('member_address');
            $table->string('member_pincode');
            $table->string('member_gender');
            $table->string('member_relation');
            $table->string('member_contact')->nullable();
            $table->string('member_image')->nullable();
            $table->string('member_city')->nullable();
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
        Schema::dropIfExists('addmembers');
    }
}
