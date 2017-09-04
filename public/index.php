<?php

namespace Codigo83;

use Codigo83\Armors\BronceArmour;
use Codigo83\Armors\SilverArmour;

require '../vendor/autoload.php';
require '../src/helpers.php'; 



$bronceArm= new BronceArmour();
$silverArm= new SilverArmour();

$espada= new Arm('Espada');
$flecha= new Arm('Flecha');


$soldado= new Soldier('Áragon', 20, 30);
$arquero= new Archer('Legolas', 20, 35);

$soldado->setArm( $espada );
$arquero->setArm( $flecha );


$batalla= new Battle( $soldado, $arquero);

$soldado->setArmour($bronceArm);
$arquero->setArmour($silverArm);

$batalla->start();


?>
