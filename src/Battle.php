<?php

namespace Codigo83;

class Battle{
	private $fighterA;
	private $fighterB;
	
	public function __construct(Unit $a, Unit $b){
		$this->fighterA= $a;
		$this->fighterB= $b;
	}

	public function start(){
		show("<strong>Comienza la batalla entre {$this->fighterA->getName()} y {$this->fighterB->getName()}</strong>");
		show("<small><u>Formula del daño</u> = (daño de arma + daño de guerrero / 2)</small>");
		show("<mark style='background-color: yellow'><strong>{$this->fighterA->getName()}</strong> hp: ({$this->fighterA->getHp()}), arm: ({$this->fighterA->getArm()->toString()}), damage: (".$this->fighterA->getDamage()."), armour: (" . ((  $this->fighterA->hasArmour()  )?  $this->fighterA->hasArmour()->toString()  : 'no') . "), Hit damage == [". (($this->fighterA->getDamage() + $this->fighterA->getArm()->getDamage()) / 2) ."]</mark> ");
		show("<mark style='background-color: lightblue'><strong>{$this->fighterB->getName()}</strong> hp: ({$this->fighterB->getHp()}), arm: ({$this->fighterB->getArm()->toString()}), damage: (".$this->fighterB->getDamage()."), armour: (" . ((  $this->fighterB->hasArmour()  )? $this->fighterB->hasArmour()->toString() : 'no') . "), Hit damage == [". (($this->fighterB->getDamage() + $this->fighterB->getArm()->getDamage()) / 2) ."]</mark>");
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