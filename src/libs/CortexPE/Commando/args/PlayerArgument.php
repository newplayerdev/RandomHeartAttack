<?php

namespace NewPlayerMC\RandomHeartAttack\libs\CortexPE\Commando\args;

use NewPlayerMC\RandomHeartAttack\libs\CortexPE\Commando\args\BaseArgument;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\player\Player;
use pocketmine\Server;

class PlayerArgument extends BaseArgument {

    public function __construct(bool $optional = false) {
        parent::__construct("player", $optional);
    }

    public function getNetworkType(): int {
        return AvailableCommandsPacket::ARG_TYPE_TARGET;
    }

    public function canParse(string $testString, CommandSender $sender): bool {
        return (bool)preg_match('/^(?!rcon|console)[a-zA-Z0-9_ ]{1,16}$/i', $testString);
    }

    public function parse(string $argument, CommandSender $sender): string|Player|null {
        $player = Server::getInstance()->getPlayerExact($argument);
        if($player !== null){
            return $player;
        }
        return $argument;
    }

    public function getTypeName(): string {
        return 'player';
    }
}
