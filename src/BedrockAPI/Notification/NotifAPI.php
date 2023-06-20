<?php

namespace BedrockAPI\Notification;

use BedrockAPI\BedrockAPI;
use pocketmine\player\Player;
use pocketmine\network\mcpe\protocol\ToastRequestPacket;

class NotifAPI {

    public function __construct() {
        // nothing!
    }

    public function say(Player $player, string $msg): void {
        // NotifAPI::say($player, "hellow")
        if ($player instanceof Player) {
            $player->sendMessage($msg);
        } else {
            return;
        }
    }

    public static function toast(Player $player, string $title, string $msg): void {
        // NotifAPI::toast($player,"test_server","yooo");
        if (empty($title) || empty($msg)) {
            return;
        }
        if ($player instanceof Player) {
            return;
        }
        $toastpacket = ToastRequestPacket::create($title, $msg);
        $player->getNetworkSession()->sendDataPacket($toastpacket);
    }
    public function popup(Player $player, string $msg): void {
        // NotifAPI::popup($player,"hii dude");
        if (empty($msg) || !$player instanceof Player) {
            return;
        }
        $player->sendPopup($msg);
    }
    // TODO: Implementing Recipe Toast!
}