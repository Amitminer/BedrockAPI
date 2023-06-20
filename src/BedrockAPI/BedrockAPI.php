<?php

declare(strict_types=1);

namespace BedrockAPI;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use BedrockAPI\Blocks\BlockAPI;
use BedrockAPI\Items\ItemsAPI;

class BedrockAPI extends PluginBase{
    
    private static $instance;
   
   // onloading plugin...
    public function onLoad(): void {
        self::$instance = $this;
    }
    
	public function onEnable() : void{
		$this->getLogger()->info("§aEnabled BedrockAPI!"); // dont mind i used § symbol for colour instead using TextFormat..
	}

	public function onDisable() : void{
		$this->getLogger()->info("§cDisabled BedrockAPI!");
	}
	public static function BlockAPI(): BlockAPI {
        return new BlockAPI();
    }
    public static function ItemsAPI(): ItemsAPI {
        return new ItemsAPI();
    }
	// For Internal Use Only!
    public static function getInstance(): self
    {
        return self::$instance;
    }
}