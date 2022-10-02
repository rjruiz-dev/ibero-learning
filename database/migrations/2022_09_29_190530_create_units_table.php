<?php

use App\Models\Unit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->tinyInteger('order');
            $table->enum('unit_type', [
                Unit::ZIP, Unit::VIDEO, Unit::SECTION,  
            ])->default(Unit::SECTION);
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('file')->nullable();
            $table->boolean('free')->default(false);
            $table->unsignedTinyInteger('unit_time')->nullable()->comment('Total minutes');
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
        Schema::dropIfExists('units');
    }
}
