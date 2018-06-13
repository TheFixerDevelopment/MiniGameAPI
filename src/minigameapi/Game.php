<?php
namespace minigameapi;

use pocketmine\level\Position;

abstract class Game {
	const NAME = 'abstract';
	private $title;
	private $runningTime;
	private $waitingRoom;
	private $waitingTime;
	private $teams = [];
	public function __construct(string $title = self::NAME,?Time $runningTime = new Time(0,5),?Position $waitingRoom, ?Time $waitingTime = new Time(30)) {
		$this->title = $title;
		$this->runningTime = $runningTime;
		$this->waitingRoom = $waitingRoom;
		$this->waitingTime = $waitingTime;
	}
	public function broadcastMessage(string $message){
		foreach($this->teams as $team) {
			$team->broadcastMessage($message);
		}
		return;
	}
	public function addTeam(Team $team) {
		$this->teams[] = $team
		return;
	}
	pubic function removeTeam(string $teamname) {
		foreach($this->teams as $key => $team){
			if($team->getName() == $teamname){
				unset($this->teams[$key]);
			}
		}
		$this->teams = array_values($this->teams);
		return;
	}
	public function getTitle() : string{
		return $this->title;
	}
}
