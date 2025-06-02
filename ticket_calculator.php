<?php

function calculateTotalTickets(int $adults, int $children): int
{
    $adultTicketCount = $adults * 3;
    $childrenTicketCount = $children * 2;
    $totalTickets = $adultTicketCount + $childrenTicketCount;

    return $totalTickets;
}

$adultCount = 5;
$childCount = 8;
$totalRequiredTickets = calculateTotalTickets($adultCount, $childCount);

echo "大人が{$adultCount}人、子供が{$childCount}人の場合、必要なチケットの合計枚数は{$totalRequiredTickets}枚です。\n";

?>