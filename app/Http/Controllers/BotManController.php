<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;


class BotManController extends Controller
{
    public function handle()
    {
        $botman=app('botman');

        $botman->hears("{message}" ,function($botman,$message)
        {
            if ($message == "Oi" or  "oi") {
                $this->askName($botman);
            }
            else
            {
                $botman->replay('digite oi');
            }
        });
        $botman->listen();
    }

    public function askName($botman)
    {
          $botman->ask(" Oi, qual e o seu nome?", function(Answer $answer)
          {
              $name=$answer->getText();
              $this->say('prazer em conhecer você '  .$name);
          });
    }
}

