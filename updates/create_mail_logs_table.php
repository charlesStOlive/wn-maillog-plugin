<?php

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waka_maillog_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('send_box_id')->unsigned()->nullable();
            $table->integer('maileable_id')->nullable();
            $table->string('maileable_type')->nullable();
            $table->string('logeable_type')->nullable();
            $table->integer('logeable_id')->nullable();
            $table->string('type')->nullable();
            $table->text('meta')->nullable();
            $table->text('tags')->nullable();
            $table->integer('count')->nullable();
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
        Schema::dropIfExists('waka_maillog_logs');
    }
};