<?php

namespace Codigo83\Weapons;

use Codigo83\Weapon;
use Codigo83\Unit;

abstract class Bow extends Weapon{


	public function descriptionAttack(Unit $attacker, Unit $opponent){

		return "<strong>{$attacker->getName()}</strong> lanza una flecha con su {$attacker->getWeapon()->getName()} a {$opponent->getName()}";

	}

}