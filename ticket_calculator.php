//問題
ある遊園地では、乗り物に乗るためにチケットが必要です。大人は3枚、子供は2枚のチケットがそれぞれ必要です。
あるグループが遊園地に来て、大人の人数と子供の人数が分かっています。このグループ全員が乗り物に乗るために必要なチケットの合計枚数を計算するプログラムを作成してください。
また、大人が5人、子供が8人のグループの場合、必要なチケットの合計枚数は何枚になるでしょうか。

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
