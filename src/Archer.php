<?php

namespace Codigo83;

use Codigo83\Weapons\Bow;
use Codigo83\Weapons\BasicBow;

class Archer extends Unit{

	private $agility= 3;


	public function __construct($name, Bow $bow= null){

		$bow= ($bow === null)? new BasicBow() : $bow;
		
		parent::__construct($name, $bow );
	}

	public function getAgility(){
		return $this->agility;
	}
	//

}

