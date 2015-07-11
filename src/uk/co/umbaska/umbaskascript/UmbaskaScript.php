<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\plugin\PluginBase as Base;

class UmbaskaScript extends Base {

	public $eventsArray = array();
	public $effectsArray = array();
	public $loadedEvents = array();
	public $loadedEffects = array();
    public function onEnable() {
        if (!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
		if (!is_dir($this->getDataFolder() . "scripts/")) mkdir($this->getDataFolder() . "scripts/");
		ScriptLoader::loadScripts($this);
	}
	
}