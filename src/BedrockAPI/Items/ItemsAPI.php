<?php

namespace BedrockAPI\Items;

use pocketmine\item\VanillaItems;

class ItemsAPI {

    public static function getItem(string $ItemName) {
        $ItemName = strtoupper($ItemName);
        if (!is_string($ItemName)) {
            return;
        }
        return VanillaItems::$ItemName();
    }
}
