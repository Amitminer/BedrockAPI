<?php

declare(strict_types = 1);

namespace BedrockAPI\Utility;

use BedrockAPI\BedrockAPI;

class ColorManager {
    
    public static function getRandomColor() {
        $colors = [
            "§l§0",   // Black
            "§l§1",   // Dark Blue
            "§l§2",   // Dark Green
            "§l§3",   // Dark Aqua
            "§l§4",   // Dark Red
            "§l§5",   // Dark Purple
            "§l§6",   // Gold
            "§l§7",   // Gray
            "§l§8",   // Dark Gray
            "§l§9",   // Blue
            "§l§a",   // Green
            "§l§b",   // Aqua
            "§l§c",   // Red
            "§l§d",   // Light Purple
            "§l§e",   // Yellow
            "§l§f",   // White
            "§l",     // Bold
            "§l§l",   // Bold
            "§l§m",   // Strikethrough
            "§l§n",   // Underline
            "§l§o",   // Italic
            "§l§r"    // Reset (White)
        ];
        $randomColor = $colors[array_rand($colors)];
        return $randomColor;
    }
}