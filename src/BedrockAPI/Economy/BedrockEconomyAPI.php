<?php

namespace BedrockAPI\Economy;

use cooldogedev\BedrockEconomy\libs\cooldogedev\libSQL\context\ClosureContext;
use onebone\economyapi\EconomyAPI;
use pocketmine\player\Player;
use pocketmine\Server;
use Closure;

class BedrockEconomyAPI {
    
    //Author: [DavidGlitch04]
    public const ECONOMYAPI = "EconomyAPI";
	
	public const BEDROCKECONOMYAPI = "BedrockEconomyAPI";
	
    private static function getEconomy(): array
    {
        $api = Server::getInstance()->getPluginManager()->getPlugin('EconomyAPI');
        if ($api !== null) {
            return [self::ECONOMYAPI, $api];
        } else {
            $api = Server::getInstance()->getPluginManager()->getPlugin('BedrockEconomy');
            if ($api !== null) {
                return [self::BEDROCKECONOMYAPI, $api];
            } else{
                return [null];
            }
        }
    }
    public static function isInstall(): bool
    {
        // BedrockEconomyAPI::isInstall();
        return !is_null(self::getEconomy()[0]);
    }
 
    public static function myMoney(Player $player, Closure $callback): void
    {
        //usage:
      /* BedrockEconomyAPI::myMoney($player, function($balance) {
           var_dump($balance);
       }); */
        if (self::getEconomy()[0] === self::ECONOMYAPI) {
            $money = self::getEconomy()[1]->myMoney($player);
            assert(is_float($money));
            $callback($money);
        } elseif (self::getEconomy()[0] === self::BEDROCKECONOMYAPI) {
            self::getEconomy()[1]->getAPI()->getPlayerBalance($player->getName(), ClosureContext::create(static function (?int $balance) use ($callback): void {
                $callback($balance ?? 0);
            }));
        }
    }

    public static function addMoney(Player $player, int $amount): void
    {
        // BedrockEconomyAPI::addMoney($player, 100);
        if (self::getEconomy()[0] === self::ECONOMYAPI) {
            self::getEconomy()[1]->addMoney($player, $amount);
        } elseif (self::getEconomy()[0] === self::BEDROCKECONOMYAPI) {
            self::getEconomy()[1]->getAPI()->addToPlayerBalance($player->getName(), (int) $amount);
        }
    }

    public static function reduceMoney(Player $player, int $amount, Closure $callback): void
    {
        /* usage>
        BedrockEconomyAPI::reduceMoney($player, 50, function($success) {
    // Handle the result of reducing money
    if ($success) {
        $this->getLogger()->info("Money reduced successfully");
    } else {
        $this->getLogger()->info("Failed to reduce money");
    }
        });*/
        if (self::getEconomy()[0] === self::ECONOMYAPI) {
            $callback(self::getEconomy()[1]->reduceMoney($player, $amount) === EconomyAPI::RET_SUCCESS);
        } elseif (self::getEconomy()[0] === self::BEDROCKECONOMYAPI) {
            self::getEconomy()[1]->getAPI()->subtractFromPlayerBalance($player->getName(), (int) ceil($amount), ClosureContext::create(static function (bool $success) use ($callback): void {
                $callback($success);
            }));
        }
    }
}