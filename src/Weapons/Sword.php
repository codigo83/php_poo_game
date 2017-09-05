<?php

namespace Codigo83\Weapons;

use Codigo83\Weapon;
use Codigo83\Unit; 

abstract class Sword extends Weapon{


	public function descriptionAttack(Unit $attacker, Unit $opponent){

		return "<strong>{$attacker->getName()}</strong> golpea con su {$attacker->getWeapon()->getName()} a {$opponent->getName()}";

	}

}