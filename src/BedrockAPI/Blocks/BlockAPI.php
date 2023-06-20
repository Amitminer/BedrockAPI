<?php

namespace BedrockAPI\Blocks;

use pocketmine\block\VanillaBlocks;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\item\LegacyStringToItemParser;
use pocketmine\item\LegacyStringToItemParserException;
use pocketmine\item\StringToItemParser;

class BlockAPI {

    public static function getBlockTypeIds(Block $block): int {
        // Get the type ID of the block, which can be negative or positive
        $blockType = $block->getTypeId();
        if ($blockType < 0) {
            $blockId = -$blockType;
        } else {
            $blockId = $blockType;
        }
        return $blockId;
    }

    public static function stringToBlock(string $input): ?Block {
        // Convert a string into a Block item (e.g., "minecraft:dirt", "wooden_sword")
        $string = strtolower(str_replace([' ', 'minecraft:'], ['_', ''], trim($input)));
        try {
            $block = StringToItemParser::getInstance()->parse($string) ?? LegacyStringToItemParser::getInstance()->parse($string);
        } catch (LegacyStringToItemParserException $e) {
            return null;
        }
        return $block;
    }

    public static function getBlock(string $blockName): ?Block {
        // Get a block by its name (e.g., getBlock("dirt"))
        // Remember that you can't use item names as blocks (e.g., if you try to use "diamond_block", it will throw an error)
        $blockName = strtoupper($blockName);
        if (!is_string($blockName)) {
            return null;
        }
        return VanillaBlocks::$blockName();
    }

    public static function getBlockItem(string $blockName, int $count = 1): ?Item {
        // Get a block as an Item with the given count
        // If count is null, it will default to 1
        if (!is_string($blockName) || !is_int($count)) {
            return null;
        }
        $blockName = strtoupper($blockName);
        $block = self::getBlock($blockName);
        if ($block === null) {
            return null;
        }
        return $block->asItem()->setCount($count);
    }
}