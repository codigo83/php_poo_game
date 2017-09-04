<?php

namespace Codigo83\Armors;



class SilverArmour implements Armor{

	public function damage($damage){
		return $damage / 4;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		return str_replace('Codigo83\\', '', get_class($this));
	}

}

?>