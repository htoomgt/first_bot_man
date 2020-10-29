<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');


        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }

    public function messengerGetStarted(BotMan $bot){
        $bot->reply(ButtonTemplate::create('Please kindly choose Language you want to use.'))
            ->addButton(ElementButton::create('English')
                ->type('postback')
                ->payload('lang_eng_chosen')
            )
            ->addButton(ElementButton::create('မြန်မာ unicode')
                ->type('postback')
                ->payload('lang_mm_unicode_chosen')
            )
            ->addbutton(ElementButton::crate('ျမန္မာ zawgyi')
                ->type('postback')
                ->payload('lang_mm_zawgyi_chosen')
            );

    }
}
