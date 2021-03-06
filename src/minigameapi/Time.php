<?php
namespace minigameapi;

class Time {
	private $tick = 0;
	public function __construct(int $tick = 0,float $sec = 0, float $min = 0, float $hour = 0) {
		$this->setTime($sec, $min, $hour);
	}
	public function setTime(int $tick = 0,float $sec = 0, float $min = 0, float $hour = 0) {
		$min += $hour * 60;
		$sec += $min * 60;
		$tick += $sec * 20;
		$this->tick = $tick;
	}
	public function addTime(int $tick = 0,float $sec = 0, float $min = 0, float $hour = 0) {
		$min += $hour * 60;
		$sec += $min * 60;
		$tick += $sec * 20;
		$this->tick += $tick;
	}
	public function reduceTime(int $tick = 0,float $sec = 0, float $min = 0, float $hour = 0) {
		$min += $hour * 60;
		$sec += $min * 60;
		$tick += $sec * 20;
		$this->tick -= $tick;
	}
	public function asSec() : float {
		return $this->tick / 20;
	}
	public function asMin() : float {
		return $this->asSec() / 60;
	}
	public function asHour() : float {
		return $this->asMin() / 60;
	}
	public function asTick() : int {
		return (int)round($this->tick,0);
	}
}
