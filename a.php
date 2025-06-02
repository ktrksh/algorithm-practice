<?php

function calculateTotalBreads(int $initial_count): int
{
    $totalBreads = $initial_count;
    $currentBreads = $initial_count;

    while ($currentBreads >= 5) {
        $bonusBreads = floor($currentBreads / 5);
        $totalBreads += $bonusBreads;
        $currentBreads = ($currentBreads % 5) + $bonusBreads;
    }

    return $totalBreads;
}

$initialPurchase = 32;
$totalEatable = calculateTotalBreads($initialPurchase);
echo "最初に{$initialPurchase}個購入した場合、トータルで{$totalEatable}個のパンを食べられます。\n";

?>