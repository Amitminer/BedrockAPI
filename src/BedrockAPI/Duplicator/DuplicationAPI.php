<?php

namespace BedrockAPI\Duplicator;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;

class DuplicationAPI {

    public static function dupehand(Player $player, int $count = 2): void{
        $item = $player->getInventory()->getItemInHand();
        $itemName = $item->getName();
        if (!$item->isNull()) {
            $cloned = $item->setCount($count);
            $player->getInventory()->addItem($cloned);
            $player->sendMessage("§aSuccessfully cloned {$itemName} ");
        } else {
            $player->sendMessage("§cYou can't clone AIR");
        }
    }
}
