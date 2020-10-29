<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');


$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('GET_STARTED', BotManController::class.'@messengerGetStarted');

$botman->hears('lang_eng_chosen', function($bot){
    $bot->reply('You have chosen English language');
});

$botman->hears('lang_mm_unicode_chosen', function($bot){
    $bot->reply('You have chosen Myanmar language with unicode font display');
});

$botman->hears('lang_mm_zawgyi_chosen', function($bot){
    $bot->reply('You have chosen Myanmar language with zaw font display');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
