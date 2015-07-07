<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Base;

use uk\co\umbaska\umbaskascript\ScriptLoader;

class UmbaskaScript extends Base {
	
	public static $eventsArray = array();
	
    public function onEnable() {
		$plugin = $this;
        if (!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
		if (!is_dir($this->getDataFolder() . "scripts/")) mkdir($this->getDataFolder() . "scripts/");
		ScriptLoader::loadScripts();
	}
	
	public function returnEventsArray() {
		return self::$eventsArray();
	}
	
	public static function getInstance(Server $server){
		return $server->getPluginManager()->getPlugin("UmbaskaScript");
	}
}