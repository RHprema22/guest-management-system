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
    Schema::create('meeting_summaries', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('meeting_id');
        $table->text('summary');
        $table->string('progress'); // E.g., Completed, In Progress
        $table->timestamps();

        $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_summaries');
    }
};
