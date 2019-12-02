<?php
$fp     = fopen('input', 'r');
$first  = 0;
$second = 0;

while (false !== ($line = fgets($fp))) {
    $mass       = trim($line);
    $massFuel   = floor($mass / 3) - 2;

    $first += $massFuel;
    $second += $massFuel;

    do {
        $fuelFuel = floor($massFuel / 3) - 2;

        if ($fuelFuel > 0) {
            $second += $fuelFuel;

            $massFuel = $fuelFuel;
        }
    } while ($fuelFuel > 0);
}

echo "The sum of the fuel requirements first run is {$first} and when also taking into account the mass of the added fuel it will require {$second}\n";

