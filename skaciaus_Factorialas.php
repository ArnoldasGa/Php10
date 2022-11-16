<?php 
// 3. Sukurkite paprastą formą, kurioje įvedus skaičių būtų išvedamas factorialas
// 3.1. Suskaičiuokite factorialą naudodami paprastą for ciklą
// 3.2. suskaičiuokita factorialą naudodami range funkciją ir array_reduce
// 3.3. suskaičiuokite factorialą naudodamiesi rekursiją
$fnumber = 5;
if (isset($_GET['fNumber']) && trim($_GET['fNumber']) != '') {
    $fnumber = $_GET['fNumber'];
}
?>

<html>
    <body>
        <form method="get">
            <label for="fNumber">Faktorialo numeris:</label><br>
            <input type="number" name="fNumber" value = <?=$_GET['fNumber'];?>><br>
            <input type="submit">
        </form>
        <div>Atsakymas su for ciklu : <?= forfactorial($fnumber) ?></div>
        <div>Atsakymas naudodami range funkciją ir array_reduce : <?= rangeArray($fnumber) ?></div>
        <div>Atsakymas naudodami ekursiją : <?= rekursija($fnumber,1) ?></div>
    </body>
</html>

<?php

function forfactorial($number): int
{
    $temp = 1;
    if ($number === 0)
    return 1;
    for ($i = 1; $i <= $number; $number--) {
        $temp *= $number;
    }
    return $temp;
}

function rangeArray($number): int
{
    $fArray = array_reverse(range(1,$number));
    return array_reduce($fArray, function ($number1, $number2) 
    {
        return $number1 * $number2;
    }, 1);
}

function rekursija($number,$calc): int
{

    if($number > 1){
        $calc = $calc * $number;
        $calc = rekursija($number-1,$calc);
    }
    return $calc;
}

?>