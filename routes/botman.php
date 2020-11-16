<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');


$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('GET_STARTED', BotManController::class.'@messengerGetStarted');

$botman->hears('lang_eng_chosen', BotManController::class."@hearEngLan");


$botman->hears('lang_mm_unicode_chosen', BotManController::class."@hearMMUNI");

$botman->hears('lang_mm_zawgyi_chosen', BotManController::class."@hearMMZG");

$botman->hears('peter', function ($bot){
    $bot->reply("Hello peter! How are you?");
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('get_a_joke', BotManController::class."@generateJoke");
