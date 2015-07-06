<?php

namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Base;

use uk\co\umbaska\umbaskascript\UmbaskaScript as Script;

class ScriptLoader {
    public function loadScripts() {
		$scripts = scandir($this->getDataFolder() . "scripts/");
		foreach ($scripts as &$file) {
			$contents = file($file);
			$counter = 0;
			foreach($contents as $line) {
				if ($line == "on block break:") {
					++$counter;
					array_push(Script::returnEventsArray(), "on block break::" . $file . "::" . $counter);
				}
			}
		}
	}
}