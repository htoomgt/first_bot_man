<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use Illuminate\Support\Facades\Log;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        Log::debug("debug facebook callback : ".json_encode(request()->all()));
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
        $this->getStartedTemplate($bot);

    }

    private function getStartedTemplate(BotMan $bot){
        $bot->reply(ButtonTemplate::create('Please kindly choose language you want to use!')
            ->addButton(
                ElementButton::create('🇬🇧 English')->payload('lang_eng_chosen')->type('postback')
            )
            ->addButton(
                ElementButton::create('🇲🇲 Myanmar Unicode')->payload('lang_mm_unicode_chosen')->type('postback')
            )
            ->addButton(
                ElementButton::create('🇲🇲 Myanmar Zawgyi')->payload('lang_mm_zawgyi_chosen')->type('postback')
            )
        );
    }

    public function hearEngLan(BotMan $bot)
    {
        $bot->reply(ButtonTemplate::create('You have Eng Lang. Now you request some joke')
            ->addButton(
                ElementButton::create('😜 Get a joke')->type('postback')->payload('get_a_joke')
            )

        );
    }
}
