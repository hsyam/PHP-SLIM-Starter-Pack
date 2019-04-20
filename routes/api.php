<?php


$app->get('/' , \App\Controllers\PostController::class.":index");
$app->post('/' , \App\Controllers\PostController::class.":store");
$app->put('/{id}' , \App\Controllers\PostController::class.":update");
$app->delete('/{id}' , \App\Controllers\PostController::class.":destroy");
