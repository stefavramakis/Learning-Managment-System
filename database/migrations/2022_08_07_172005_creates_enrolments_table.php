<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('course_id')->unsigned();
            $table->boolean('course_enrolled')->default(0);
            $table->boolean('course_completed')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolments');
    }
};
