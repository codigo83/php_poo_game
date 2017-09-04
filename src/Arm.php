<?php

namespace Codigo83;

class Arm{
	protected $name;
	protected $damage;
	public function __construct($name, $damage= 10){
		$this->name= $name;
		$this->damage= $damage;
	}
	public function getName(){
		return $this->name;
	}
	public function getDamage(){
		return $this->damage;
	}
	public function toString(){
		return $this->getName();
	}
}

?>