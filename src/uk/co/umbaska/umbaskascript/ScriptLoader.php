<?php
namespace uk\co\umbaska\umbaskascript;

class ScriptLoader {

    public static function loadScripts($that) {
		$files = scandir($that->getDataFolder() . "scripts/");
		$umbaska = new UmbaskaScript();
		$counter = 0;
		foreach($files as $file) {
			$in = fopen($file, 'rb');
			++$counter;
			$linecounter = 0;
			while($line = fread($in)) {
				++$linecounter;
				foreach($umbaska->eventsArray as $event) {
					$value = explode("::", $event);
					if ($line == $value[1]) {
						array_push($umbaska->loadedEvents, $file . "::" . $event . "::" . $linecounter);
					}
				}
			}
		}
		$that->getServer()->getLogger()->info("Loaded: " . $counter . " scripts!");
	}
	
}