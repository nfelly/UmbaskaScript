<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\IPlayer;

use uk\co\umbaska\umbaskascript\UmbaskaScript as Script;

use uk\co\umbaska\umbaskascript\effect\EffMessage as Message;

class ScriptParser {
    public function parseFile($file, $player, $event) {
		$contents = file($file);
		foreach($contents as $line) {
			if ($line <> "" || $line <> "#") {
				if ($line == $event) {
					$inEvent = true;
				}
				if ($inEvent == true) {
					if (strpos($line,'message ') !== false) {
						Message::messagePlayer($line, $player);
					}	
				}
			} else {
				unset($inEvent);
			}
		}
	}
}