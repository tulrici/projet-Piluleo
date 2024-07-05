<?php

require_once 'Models/PillBox.php';
require_once 'Models/Hardware/Button.php';
require_once 'Models/Hardware/LED.php';
use App\Hardware\Button;
use App\Hardware\LED;
use App\Hardware\StepMotor;

$connectButtonPin = 17; //utiliser le fichier Hardware à terme
$connectLEDPin = 27; //utiliser le fichier Hardware à terme

$PowerButtonPin = 17; //utiliser le fichier Hardware à terme
$PowerLEDPin = 27; //utiliser le fichier Hardware à terme

$connectButton = new Button($connexionButtonPin);
$connectLED = new LED($connexionLEDPin);

$PowerButton = new Button($PowerButtonPin);
$PowerLED = new LED($powerLEDPin);

//test moteur
$motorData =  [18, 23, 24, 25];

$motor0 = new StepMotor($motorData);

// test: remplir les 24 compartiments avec 24 pills identiques
$PillBox0 = new PillBox(0, 0, array_fill(0, 24, 0), $motor0);
$Pills = array();
    for ($i = 0; $i < count($Pillbox0->getCompartments()); $i++) {
        $Pills[] = new Pill($i, "Pill$i", "08:00" , 1, 0);
    }

for ($i = 0; $i < count($Pillbox0->getCompartments()); $compartment++){
    $PillBox0->addPillToCompartment($Pill, $compartment);
    }


// test 1 rotation
$PillBox0->rotateOnce();


// test 1 rotation par timer
//gerer le timer
$PillBox0->rotateOnce();


// Example usage LED faut definir le state
if (isset($_GET['state'])) {
    $state = $_GET['state'];
    $PowzeLED->toggleLED($state);
}
