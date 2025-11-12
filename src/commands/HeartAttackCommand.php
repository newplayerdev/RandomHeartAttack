<?php

namespace NewPlayerMC\RandomHeartAttack\commands;

use NewPlayerMC\RandomHeartAttack\CardiacPlayer;
use NewPlayerMC\RandomHeartAttack\commands\subs\HAGetSubCommand;
use NewPlayerMC\RandomHeartAttack\libs\CortexPE\Commando\args\PlayerArgument;
use NewPlayerMC\RandomHeartAttack\libs\CortexPE\Commando\BaseCommand;
use NewPlayerMC\RandomHeartAttack\libs\jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class HeartAttackCommand extends BaseCommand
{
    protected function prepare(): void
    {
        $this->setPermission($this->getPermission());
        $this->registerArgument(0, new PlayerArgument(true));
        // TODO: Implement prepare() method.
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {
        if ($sender instanceof Player) {
            if (!isset($args['player'])) {
                $this->sendForm($sender, $sender);
            } else {
                $player = $args['player'];
                if ($player instanceof CardiacPlayer) {
                    $this->sendForm($sender, $player);
                } else $sender->sendMessage("Player {$player} was not found");
            }
        }
    }

    public function getPermission(): string
    {
        return "heartattack.command";
    }

    private function sendForm(Player $player, CardiacPlayer $cardiacPlayer): void {
        $form = new SimpleForm(function (Player $player, string $data = null) use ($cardiacPlayer) {
            if ($data === null) return;
            $name = $cardiacPlayer->getName();
            switch ($data) {
                default: break;
                case 'cause':
                    $cardiacPlayer->causeHeartAttack();
                    $player->sendMessage("Caused heart attack to $name");
                    break;
                case 'changeha':
                    $cardiacPlayer->setRandomTicksToLive();
                    $player->sendMessage("Changed ticks to live of $name");
                    break;
                case 'changes':
                    $cardiacPlayer->setMaxSprintingTicks();
                    $player->sendMessage("Change max sprinting ticks of $name");
                    break;
            }
        });

        $form->setTitle("[§cHeart Attack Monitor§f]");
        $form->setContent(
            "Ticks to live: §c{$cardiacPlayer->getTicksToLive()} §f(§c{$cardiacPlayer->getTicksToLiveFormatted()}§f)\nMax sprinting ticks: §c{$cardiacPlayer->getMaxSprintingTicks()} §f(§c{$cardiacPlayer->getMaxSprintingTicksFormatted()}§f)"
        );
        $form->addButton("Cause a heart attack", label: "cause");
        $form->addButton("Change heart attack tick\n(Random)", label: "changeha");
        $form->addButton("Change max sprint tick\n(Random)", label: "changes");
        $form->sendToPlayer($player);
    }

}