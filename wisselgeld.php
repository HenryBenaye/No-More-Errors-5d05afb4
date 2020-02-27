<?php
$input = $argv[1];
try {
    if (!isset($input)) {
        throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden");
    } elseif (!is_numeric($input)) {
        throw new Exception("Voer een getal in");
    } elseif ($input < 0) {
        throw new Exception("Ik kan geen negatief bedrag wisselen");
    }

    $change = (float) $argv[1];

    $EUROS  = [
        50 => "euro",
        20 => "euro",
        10 => "euro",
        5 => "euro",
        2 => "euro",
        1 => "euro"
    ];

    $CENTEN  = [
        50 => "cent",
        20 => "cent",
        10 => "cent",
        5 => "cent",
        2 => "cent",
        1 => "cent"
    ];

    $change = (round($change / 0.05, 0)) * 0.05;
    $heleEuros = floor($change);
    $heleCenten = ($change - $heleEuros) * 100;

    foreach ($EUROS as $euro => $type1) {
        $heleEuros = round($heleEuros, 2);
        if (floor($heleEuros / $euro) > 0) {
            $times =  floor($heleEuros / $euro);
            echo '$times X $euro euro' . PHP_EOL;
            $heleEuros = $heleEuros - ($times * $euro);
        }
    }

    foreach ($CENTEN as $cent => $type2) {
        $heleCenten = round($heleCenten, 2);
        if (floor($heleCenten / $cent) > 0) {
            $times =  floor($heleCenten / $cent);
            echo '$times X $cent cent' . PHP_EOL;
            $heleCenten = $heleCenten - ($times * $cent);
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
