<?php

namespace Codigo83;

class Battle{
	private $fighterA;
	private $fighterB;
	
	public function __construct(Unit $a, Unit $b){

		//Sera aleatorio

		if( rand(0,1) === 0 ){
			$this->fighterA= $a;
			$this->fighterB= $b;	
		}else{
			$this->fighterA= $b;
			$this->fighterB= $a;
		}

		 
		
	}

	public function start(){
		show("<strong>Comienza la batalla entre {$this->fighterA->getName()} y {$this->fighterB->getName()}</strong>");

	
		
		
		show("<strong>{$this->fighterA->getName()}</strong> hp: ({$this->fighterA->getHp()}), arm: ({$this->fighterA->getWeapon()->toString()}), armor: (" . ((  $this->fighterA->hasArmor()  )?  $this->fighterA->hasArmor()->toString()  : 'no') . ") ");
		
		
		show("<strong>{$this->fighterB->getName()}</strong> hp: ({$this->fighterB->getHp()}), arm: ({$this->fighterB->getWeapon()->toString()}), armor: (" . ((  $this->fighterB->hasArmor()  )? $this->fighterB->hasArmor()->toString() : 'no') . ")");
		
		show("<mark style='background-color: yellow'>Comienza ({$this->fighterA->getName()})</mark>");
		
		show("<hr/>");


		while($this->status()){
			

			$this->fighterA->attack($this->fighterB);
			$this->fighterB->attack($this->fighterA);

		}
		
		$winner=($this->fighterA->getAlive())? $this->fighterA->getName() : $this->fighterB->getName();

		show("<mark style='background-color: lightgreen'>El vencedor del duelo és <strong>$winner</strong></mark>");

	}

	public function status(){
		if($this->fighterA->getAlive() && $this->fighterB->getAlive() )
			return true;
		else
			return false;
	}

}

?>