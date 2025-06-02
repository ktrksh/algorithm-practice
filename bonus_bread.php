//問題
あるパン屋さんでは、パンを5個買うと、さらにパンを1個おまけでプレゼントしてくれるキャンペーンを実施しています。
最初に購入したパンの個数から、トータルで食べられるパンの個数を算出するプログラムを作成してください。
また、最初に32個のパンを購入した場合、トータルで何個のパンを食べられるか。

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
