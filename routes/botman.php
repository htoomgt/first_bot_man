<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');


$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('GET_STARTED', BotManController::class.'@messengerGetStarted');

$botman->hears('lang_eng_chosen', BotManController::class."@hearEngLan");


$botman->hears('lang_mm_unicode_chosen', function($bot){
    $bot->reply('You have chosen Myanmar language with unicode font display');
});

$botman->hears('lang_mm_zawgyi_chosen', function($bot){
    $bot->reply('You have chosen Myanmar language with zaw font display');
});

$botman->hears('peter', function ($bot){
    $bot->reply("Hello peter! How are you?");
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('get_a_joke', BotManController::class."@generateJoke");
