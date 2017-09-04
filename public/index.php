<?php

namespace Codigo83;

use Codigo83\Armors\BronceArmour;
use Codigo83\Armors\SilverArmour;

require '../vendor/autoload.php';
require '../src/helpers.php'; 



$bronceArm= new BronceArmour();
$silverArm= new SilverArmour();

$espada= new Arm('Espada', 15);
$flecha= new Arm('Flecha', 7);


$soldado= new Soldier('Áragon', 50, 12);
$arquero= new Archer('Legolas', 50, 8);

$soldado->setArm( $espada );
$arquero->setArm( $flecha );


$batalla= new Battle( $soldado, $arquero);

//$soldado->setArmour($bronceArm);
//$arquero->setArmour($bronceArm);

$batalla->start();


?>
