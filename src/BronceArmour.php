<?php

namespace Codigo83;

use WarmCookie\Armour as AliasBronce;

class BronceArmour implements AliasBronce{

	public function damage($damage){
		return $damage / 2;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		return get_class($this);
	}

}


?>