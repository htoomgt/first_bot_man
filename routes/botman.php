<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');
$botman->verifyServices('I_SAID_HAHA');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('GET_STARTED', function($bot){
    $bot->reply("I am bot and you get started the service");
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
