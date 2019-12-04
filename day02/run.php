<?php
$orig       = explode(',', trim(file_get_contents('input')));
$orig       = array_map('intval', $orig);
$store      = [];
$increese   = 4;
$first      = 0;
$second     = 0;

$orig[1] = 12;
$orig[2] = 2;

$sequence = $orig;

for ($pointer = 0; $pointer<= count($sequence) - 1; $pointer+=$increese) {
    $number     = (int) $sequence[$pointer];
    $params     = [];

    if (99 === $number) {
        $first = $sequence[0];
        break;
    } else if (2 === $number) {
        $params = array_slice($sequence, $pointer);
        $sequence[$sequence[$pointer + 3]] = array_product([$sequence[$sequence[$pointer+1]], $sequence[$sequence[$pointer+2]]]);
    } else if (1 === $number) {
        $params = array_slice($sequence, $pointer);
        $sequence[$sequence[$pointer + 3]] = array_sum([$sequence[$sequence[$pointer+1]], $sequence[$sequence[$pointer+2]]]);
    }
}

for ($noun = 0; $noun < 100; $noun++) {
    for ($verb = 0; $verb < 100; $verb++) {

        $sequence = $orig;

        for ($pointer = 0; $pointer <= count($sequence) - 1; $pointer += $increese) {
            $sequence[1] = $noun;
            $sequence[2] = $verb;

            $number     = (int) $sequence[$pointer];
            $params     = [];

            if (99 === $number) {
                break;
            } else if (2 === $number) {
                $params = array_slice($sequence, $pointer);
                $sequence[$sequence[$pointer + 3]] = array_product([$sequence[$sequence[$pointer+1]], $sequence[$sequence[$pointer+2]]]);
            } else if (1 === $number) {
                $params = array_slice($sequence, $pointer);
                $sequence[$sequence[$pointer + 3]] = array_sum([$sequence[$sequence[$pointer+1]], $sequence[$sequence[$pointer+2]]]);
            }
        }

        if (19690720 === (int) $sequence[0]) {
            $second = 100 * $noun + $verb;
            break;
        }
    }
}

echo "The value left at position 0 was {$first} and the sum of noun + verb is {$second}\n";

