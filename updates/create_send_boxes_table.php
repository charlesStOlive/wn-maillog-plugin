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
        Schema::create('waka_maillog_send_boxes', function (Blueprint $table) {
            $table->id();
            $table->longtext('content');
            $table->string('name')->default('Inc');
            $table->timestamp('send_at')->nullable();
            $table->string('state')->nullable();
            $table->string('maileable_type');
            $table->text('meta')->nullable();
            $table->integer('maileable_id');
            $table->string('targeteable_type')->nullable();
            $table->string('targeteable_id')->nullable();
            $table->string('tos')->nullable();
            $table->string('cci')->nullable();
            $table->string('ccs')->nullable();
            $table->boolean('is_anonymized')->default(0);
            $table->string('sender')->nullable();
            $table->string('reply_to')->nullable();
            $table->boolean('open_log')->nullable();
            $table->boolean('click_log')->nullable();
            $table->boolean('is_embed')->nullable()->default(false);
            $table->text('mail_vars')->nullable();
            $table->text('mail_tags')->nullable();
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
        Schema::dropIfExists('waka_maillog_send_boxes');
    }
};