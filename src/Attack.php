<?php

namespace Codigo83;

use Codigo83\Unit;

class Attack{

	protected $damage;
	protected $magical;
	protected $description;

	public function __construct($damage, $magical, $description){
		$this->damage= $damage;
		$this->magical= $magical;
		$this->description= $description;
	}


	public function getDescription(Unit $unit, Unit $opponent){

		return str_replace(
				[':unit', ':opponent'],
				[$unit->getName(), $opponent->getName()],
				$this->description
			);
	}


	public function getDamage(){
		return $this->damage;
	}

	public function isMagical(){
		return $this->magical;
	}

	public function isPhysical(){
		return ! $this->isMagical();
	}



}