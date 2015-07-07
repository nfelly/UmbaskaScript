<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;

use uk\co\umbaska\umbaskascript\UmbaskaScript;

class ScriptLoader {

	public function __construct(UmbaskaScript $plugin) {
        $this->plugin = $plugin;
    }

    public static function loadScripts() {
		$scripts = scandir($this->plugin->getDataFolder() . "scripts/");
		$counter = 0;
		foreach ($scripts as &$file) {
			$contents = file($file);
			foreach($contents as $line) {
				if ($line == "on block break:") {
					++$counter;
					array_push(UmbaskaScript::returnEventsArray(), "on block break::" . $file . "::" . $counter);
				}
			}
		}
		$this->plugin->getServer()->getLogger()->error("Loaded: " . $counter . " scripts!");
	}
}