<?php

Route::group(['namespace' => 'Api\v1\Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::apiResource('task', TaskApiController::class);
});