<?php

namespace Codigo83;

abstract class Weapon{
	
	const DAMAGE= 10;
	protected $name;
	
	
	public function getDamage(){
		return static::DAMAGE;
	}

	public function getName(){
		return $this->name;
	}

	public function getClass(){
		
		
		$array_class= explode('\\', get_class($this) );
		
		$nameClass= $array_class[ count( $array_class ) - 1 ];

		return $nameClass;
	}

	public function toString(){
		return $this->getClass() .", ". $this->getDamage() ;
	}

	


}

?>