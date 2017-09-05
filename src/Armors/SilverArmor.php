<?php

namespace Codigo83\Armors;

use Codigo83\Armor;

class SilverArmor implements Armor{

	const LEVEL_PROTECT= 3;
	private $name= "Armadura de plata";


	public function getName(){
		return $this->name;
	}


	public function damage($damage){
		return $damage / self::LEVEL_PROTECT ;
	}

	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function getClass(){
		
		$array_class= explode('\\', get_class($this) );
		
		$nameClass= $array_class[ count( $array_class ) - 1 ];

		return $nameClass;
	}




	public function toString(){
		return $this->getClass() .", %". self::LEVEL_PROTECT ;
	}

}

?>