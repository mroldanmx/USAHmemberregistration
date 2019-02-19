´<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_type_id');
            $table->unsignedInteger('user_id');
            $table->text('html')->comment("Terms shown in the member type selection at registration");
            $table->text('default')->comment("Default HTML content");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('member_type_id')->references('id')->on('member_type')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
