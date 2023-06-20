<?php

namespace BedrockAPI\command;

use BedrockAPI\BedrockAPI;

class CommandAPI {

    public function __construct() {
        // nothing!
    }

    public static function unregister(string $cmdName): bool {
        // CommandAPI::unregister("cmdname");
        if (!empty($cmdName)) {
            $commandMap = BedrockAPI::getInstance()->getServer()->getCommandMap();
            $commandMap->unregister($commandMap->getCommand($cmdName));
            return true;
        } else {
            return false;
        }
    }
    // todo:
    //register & blocker 
}