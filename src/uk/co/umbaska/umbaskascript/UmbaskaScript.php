<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Base;

use uk\co\umbaska\umbaskascript\ScriptLoader as Loader;

class UmbaskaScript extends Base {
    public function onEnable() {
        if (!is_dir($this->getDataFolder())) {
    	    mkdir($this->getDataFolder());
    	}
		Loader::loadScripts();
	}
	public static $eventsArray = array();
	
	public function returnEventsArray() {
		return self::$eventsArray();
	}
}