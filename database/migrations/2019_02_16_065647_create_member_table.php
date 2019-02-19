<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('member');
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('official_number')->nullable()->comment("Special numbers for Referees");
            $table->string('member_id')->default(0)->comment("This is the special MEMBERID with 2 letters and X Numbers");
            $table->string('first_name');
            $table->string('middle_name')->nullable(true);
            $table->string('last_name');
            $table->string('gender',1)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone_1',12)->nullable();
            $table->string('phone_2',12)->nullable();
            $table->string('email',100)->nullable();
            $table->tinyInteger('citizenship')->nullable();
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
        Schema::dropIfExists('member');
    }
}
