<?php

namespace Codigo83;

class Soldier extends Unit {

	
	
	
	public function __construct($name, $hp, $damage){
		parent::__construct($name, $hp, $damage);
		
		
	}
	
	
	


	public function attack(Unit $opponent){

		if( $this->getAlive() && $opponent->getAlive()){

			show( "<mark style='background-color:yellow' >({$this->getHp()}) {$this->name}</mark> golpea con su espada a  {$opponent->name}" );
			$opponent->takeDamage( $this->getDamage() + $this->getArm()->getDamage() / 2 );
		}
		

	}


	public function takeDamage($damage){
		
		$damage= $this->absorbDamage($damage);

		return parent::takeDamage( $damage );
		
	}

	

}

?>
