<?php

use App\Models\Coupon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('code')->unique();
            $table->string('description');
            $table->enum('discount_type', [
                Coupon::PERCENT, Coupon::PRICE])->default(Coupon::PRICE);
            $table->tinyInteger('discount');
            $table->boolean('enabled');
            $table->date('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); //borrado logico
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
