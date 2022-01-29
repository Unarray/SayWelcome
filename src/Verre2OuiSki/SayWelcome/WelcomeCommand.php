<?php

namespace Verre2OuiSki\SayWelcome;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\player\Player;

class WelcomeCommand extends Command{

    private $plugin;

    public function __construct( Main $plugin ){
        $this->plugin = $plugin;

        parent::__construct(
            "welcome",
            "Say hello to new players !",
            "/welcome"
        );

        $this->setPermission("saywelcome.command.welcome");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        
        // If player doesn't have permission
        if(!$sender->hasPermission($this->getPermission())){
            $sender->sendMessage($this->getPermissionMessage());
            return;
        }

        // If player isn't a player
        if(!($sender instanceof Player)){
            $sender->sendMessage("You must be a player to do that");
            return;
        }
        

        if( $this->plugin->new_player ){

            if( $this->plugin->new_player != $sender->getName() ){

                if( !in_array( $sender->getName(), $this->plugin->players_say_welcome ) ){
                    
                    $messages = $this->plugin->messages["player_say_welcome"];
                    $msg = $messages[rand(0, count($messages)-1)];
                    $sender->chat(
                        str_replace("{player}", $this->plugin->new_player, $msg)
                    );

                    foreach( $this->plugin->rewards as $reward ){
                        $this->plugin->getServer()->dispatchCommand(
                            new ConsoleCommandSender(
                                $this->plugin->getServer(),
                                $this->plugin->getServer()->getLanguage()
                            ),
                            str_replace("{player}", $sender->getName(), $reward)
                        );
                    }

                    array_push($this->plugin->players_say_welcome, $sender->getName());
                    
                // Player already said welcome
                }else{
                    $sender->sendMessage(
                        str_replace(
                            "{player}",
                            $this->plugin->new_player,
                            $this->plugin->messages["already_say_welcome"]
                        )
                    );
                }

            // Is the new player
            }else{
                $sender->sendMessage(
                    $this->plugin->messages["is_new_player"]
                );
            }

        // There are no new player
        }else{
            $sender->sendMessage(
                $this->plugin->messages["no_new_player"]
            );
        }
    }
}