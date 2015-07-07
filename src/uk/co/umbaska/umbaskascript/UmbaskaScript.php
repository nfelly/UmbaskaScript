<?php
namespace uk\co\umbaska\umbaskascript;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Base;

//use uk\co\umbaska\umbaskascript\ScriptLoader as Loader;

class UmbaskaScript extends Base {
    public function onEnable() {
        if (!file_exists("/plugins/UmbaskaScript/")) {
    	    mkdir("/plugins/UmbaskaScript/");
    	}
		if (!file_exists("/plugins/UmbaskaScript/scripts/")) {
    	    mkdir("/plugins/UmbaskaScript/scripts/");
    	}
		//Loader::loadScripts();
	}
	/*public static $eventsArray = array();
	
	public function returnEventsArray() {
		return self::$eventsArray();
	}*/
}