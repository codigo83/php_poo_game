<?php

namespace Codigo83\Armors;



class BronceArmour implements Armor{

	public function damage($damage){
		return $damage / 2;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		
		return str_replace('Codigo83\\', '', get_class($this));
		
	}

}


?>