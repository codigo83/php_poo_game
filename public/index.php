<?php

namespace Codigo83;

use Codigo83\Armors\BronceArmor;
use Codigo83\Armors\SilverArmor;
use Codigo83\Weapons\BasicSword;
use Codigo83\Weapons\BasicBow;
use Codigo83\Weapons\StrongSword;
use Codigo83\Weapons\StrongBow;
use Codigo83\Weapons\Stick;



require '../vendor/autoload.php';
require '../src/helpers.php'; 




$soldado= new Unit('Áragon');
$arquero= new Unit('Legolas');


$soldado->setWeapon( new StrongSword() );
$arquero->setWeapon( new StrongBow() );



$soldado->setArmour( new BronceArmor() );
$arquero->setArmour( new SilverArmor() );

$batalla= new Battle( $soldado, $arquero);


$batalla->start();


?>
