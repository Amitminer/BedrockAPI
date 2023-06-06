<?php

namespace BedrockAPI\Blocks;

use pocketmine\block\VanillaBlocks;

class BlockAPI {

    public static function getBlock(string $BlockName) {
        $BlockName = strtoupper($BlockName);
        if (!is_string($BlockName)) {
            return;
        }
        return VanillaBlocks::$BlockName();
    }
    //getBlockItem("BlockName???", 1);
    public static function getBlockItem(string $BlockName, int $count = 1) {
        if (!is_string($BlockName)) {
            return;
        }
        if (!is_int($count)) {
            return;
        }
        $BlockName = strtoupper($BlockName);
        return VanillaBlocks::$BlockName()->asItem()->setCount($count);
    }
}
