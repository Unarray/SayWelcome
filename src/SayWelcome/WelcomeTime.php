<?php

namespace SayWelcome;

use pocketmine\scheduler\Task;

class WelcomeTime extends Task{

    private $plugin;

    public function __construct( Main $plugin ){
        $this->plugin = $plugin;
    }

    public function onRun(): void{
        $this->plugin->new_player = null;
        $this->plugin->players_say_welcome = [];
        $this->plugin->task = null;
    }

}