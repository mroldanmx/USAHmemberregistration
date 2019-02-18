<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',50)->nullable(false)->comment("Myself, Child Family Member (Under 18), Adult Family Member (18 and over)");
            $table->text('terms')->comment("Terms shown in the registration type selection at registration");
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
        Schema::dropIfExists('registration_type');
    }
}
