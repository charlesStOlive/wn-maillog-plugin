<?php

Route::group(['middleware' => ['Waka\Maillog\Classes\Middleware\MailgunWebHook']], function () {
    Route::prefix('/api/mailgun/wo')->group(function () {
        Route::post('{type}',  '\Waka\MailLog\Classes\MailgunWebHook@messageType')->name('messageType');
    });
});
