<?php

namespace Codigo83;

use Codigo83\Weapons\Sword;
use Codigo83\Weapons\BasicSword;

class Soldier extends Unit {

	private $agility= 2;


	public function __construct($name, Sword $sword= null){

		$sword= ($sword === null)? new BasicSword() : $sword;

		parent::__construct($name, $sword );
	}

	public function getAgility(){
		return $this->agility;
	}
	//
}


