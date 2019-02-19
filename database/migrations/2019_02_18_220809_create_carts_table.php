<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cart');
        Schema::dropIfExists('carts');
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session')->nullable(false);
            $table->unsignedInteger('user_id')->nullable('true');
            $table->enum('status',['CREATED','COMPLETE','INCOMPLETE','AWAITING-APPROVAL','APPROVED','REJECTED','ERROR'])->default('CREATED');
            $table->dateTime('completed_at')->nullable(true);
            $table->decimal('cost',15,2)->default(0.00);
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
        Schema::dropIfExists('carts');
    }
}
