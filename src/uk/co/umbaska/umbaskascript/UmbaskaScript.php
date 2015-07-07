<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Base;

use uk\co\umbaska\umbaskascript\ScriptLoader;

class UmbaskaScript extends Base {
    public function onEnable() {
        if (!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
		if (!is_dir($this->getDataFolder() . "scripts/")) mkdir($this->getDataFolder() . "scripts/");
		ScriptLoader::loadScripts();
	}
	
	public function returnThis() {
		return $this;
	}
	
	public static $eventsArray = array();
	
	public function returnEventsArray() {
		return self::$eventsArray();
	}
}