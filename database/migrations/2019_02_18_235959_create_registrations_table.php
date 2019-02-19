<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('registration');

        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_id')->nullable(true);
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('member_type_id')->nullable(true);
            $table->unsignedInteger('registration_type_id')->nullable(true);
            $table->unsignedInteger('address_id')->nullable(true);
            $table->unsignedInteger('association_id')->nullable(true);
            $table->unsignedInteger('affiliate_id')->nullable(true);
            $table->unsignedInteger('season_id')->nullable(true);
            $table->unsignedInteger('coupon_id')->nullable(true);
            $table->unsignedInteger('waiver_id')->nullable(true);
            $table->unsignedInteger('citizenship')->nullable(true);
            $table->unsignedInteger('diversity_type_id')->nullable(true);
            $table->unsignedInteger('donation_type_id')->default(0);

            $table->unsignedInteger('member_level_min')->nullable(true);
            $table->unsignedInteger('member_level_max')->nullable(true);
            $table->unsignedInteger('member_affiliate')->nullable(true);

            $table->decimal('usah_cost', 15, 2)->default(0);
            $table->decimal('affiliate_cost', 15, 2)->default(0);
            $table->decimal('donation_cost', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(-1);
            $table->decimal('affiliate_name')->nullable(true);

            $table->dateTime('confirmation')->nullable(true);
            $table->boolean('valid')->default(true);
            $table->unsignedInteger('refunded')->default(0);

            $table->string('waiver_agree',2)->default('');
            $table->string('concussion_waiver',2)->default('');

            $table->string('step',20)->nullable(true);
            $table->enum('status',['CREATED','IN-CART','PAID','SAVED'])->default('CREATED');


            $table->timestamps();
            $table->softDeletes();
            $table->foreign('member_type_id')
                ->references('id')
                ->on('member_type')
                ->onDelete('cascade');
            ;
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
