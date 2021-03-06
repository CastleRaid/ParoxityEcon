<?php
declare(strict_types = 1);

namespace Paroxity\ParoxityEcon\Command\Argument;

use CortexPE\Commando\args\BaseArgument;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use function preg_match;
use function trim;

class ParoxityEconPlayerArgument extends BaseArgument{

	public function __construct(string $name = "", bool $optional = false){
		parent::__construct(trim($name) === "" ? "player" : $name, $optional);
	}

	public function getTypeName(): string{
		return "Target";
	}

	public function getNetworkType(): int{
		return AvailableCommandsPacket::ARG_TYPE_TARGET;
	}

	public function canParse(string $testString, CommandSender $sender): bool{
		return (bool) preg_match("/^(?!rcon|console)[a-zA-Z0-9_ ]{1,16}$/i", $testString);
	}

	public function parse(string $argument, CommandSender $sender){
		return $argument;
	}
}