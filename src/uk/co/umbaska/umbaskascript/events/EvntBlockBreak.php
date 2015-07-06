<?php
namespace uk\co\umbaska\umbaskascript\events;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\BlockBreakEvent;

use uk\co\umbaska\umbaskascript\UmbaskaScript as Script;
use uk\co\umbaska\umbaskascript\ScriptParser as Parser;

class EvntBlockBreak implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this);
	}
 
	public function onBlockBreak(BlockBreakEvent $event){
		$p = $event->getPlayer();
		foreach(Script::returnEventsArray() as $event) {
			unset($eventsSplitArray);
			$eventsSplitArray = explode("::", $event);
			if ($eventsSplitArray[0] == "on block break") {
				$file = $eventsSplitArray[1];
				$event = $eventsSplitArray[0] . ":";
				Parser::parseFile($file, $p, $event);				
			}
		}
	}
}