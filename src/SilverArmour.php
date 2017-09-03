<?php

namespace Codigo83;

use WarmCookie\Armour;

class SilverArmour implements Armour{

	public function damage($damage){
		return $damage / 4;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		return get_class($this);
	}

}

?>