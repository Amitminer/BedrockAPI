<?php

declare(strict_types = 1);

namespace BedrockAPI\Utility;

use BedrockAPI\BedrockAPI;

class CooldownManager {
    
    private array $cooldowns = [];
    
    private function startCooldown(Player $player, int $duration): void {
        $this->cooldowns[$player->getName()] = time() + $duration;
    }
    private function hasCooldown(Player $player): bool {
        return isset($this->cooldowns[$player->getName()]) && time() < $this->cooldowns[$player->getName()];
    }
    private function getCooldownTimeRemaining(Player $player): int {
        $timeRemaining = $this->cooldowns[$player->getName()] - time();
        return max(0, $timeRemaining);
    }
}