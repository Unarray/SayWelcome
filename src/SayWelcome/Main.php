<?php

namespace SayWelcome;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

    private static $_instance;
    
    public $messages;
    private $welcome_time;
    public $new_player;
    public $rewards;
    public $task;
    public $players_say_welcome = [];

    public function onLoad() : void {
        $this->getLogger()->info(
            TextFormat::GOLD . $this->getName() . " loading..."
        );
    }

    public function onEnable() : void {
        self::$_instance = $this;

        $config = $this->getConfig();

        $this->messages = $config->get("messages");

        $this->rewards = $config->get("rewards");

        $time = explode(":", $config->get("welcome_time"));
        $this->welcome_time = intval($time[0]) * 60 * 20 + intval($time[1]) * 20;

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register( $this->getName(), new WelcomeCommand( $this ) );

        $this->getLogger()->info(
            TextFormat::GREEN . $this->getName() . " enabled !"
        );
    }



    public function onJoin( PlayerJoinEvent $event ){
        $player = $event->getPlayer();
        if(!$player->hasPlayedBefore()){
            $this->new_player = $player->getName();

            if($this->task){
                $this->task->getHandler()->cancel();
            }

            $task = new WelcomeTime( $this );
            $this->getScheduler()->scheduleDelayedTask( $task, $this->welcome_time );
            $this->task = $task;

            $this->getServer()->broadcastMessage(
                str_replace("{player}", $this->new_player, $this->messages["new_player"])
            );
        }
    }

    public static function getInstance(): self{
        return self::$_instance;
    }

}