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
    Schema::create('meetings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('visitor_id');
        $table->unsignedBigInteger('employee_id');
        $table->timestamp('scheduled_time');
        $table->enum('status', ['pending', 'approved', 'completed'])->default('pending');
        $table->string('type'); // E.g., sales, support
        $table->timestamps();

        $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
        $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
