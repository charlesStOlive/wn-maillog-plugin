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
        Schema::create('waka_maillog_session_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('end_type');
            $table->timestamp('end_at');
            $table->string('sessioneable_type')->nullable();
            $table->string('sessioneable_id')->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('waka_maillog_session_codes');
    }
};
