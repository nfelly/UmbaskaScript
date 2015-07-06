<?php

namespace uk\co\umbaska\umbaskascript\effects;

use pocketmine\Server;
use pocketmine\IPlayer;

use uk\co\umbaska\umbaskascript\UmbaskaScript as Script;

class EffMessage {
    public function messagePlayer($input, $player) {
		preg_match('~"(.*?)"~', $line, $messageString);
		$msgString = $messageString[1];
		if (strpos($playerUnparsed,'" to player::') !== false) {
			$player = explode('" to player::', $player);
			$player = $player[1];
		} else if (strpos($playerUnparsed,'" to ') !== false) {
			$player = explode('" to ', $player);
			$player = $player[1];
		} else if (strpos($playerUnparsed,'" to server::all') !== false) {
			$player = "server::all::" . $player;
		} else {
			return;
		}
		
		if (strpos($player,'server::all::') !== false) {
			$player2 = explode("::", $player);
			$player2 = $player2[2];
			$player = IPlayer::getPlayer($player2);
			$this->getServer()->broadcastMessage($msgString);
		} else {
			$player = IPlayer::getPlayer($player);
			$player->sendMessage($msgString);
		}
	}
}