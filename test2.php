<?php

function AddOneToANumber (int $initialnumber)
{
    return $initialnumber + 1;
}

$Headlines = ['Headline1', 'Headline2', 'Headline3', 'headline4', 'Headline5', 'Headline2', 'Headline3', 'headline4'];

$NumberOfElementsInHeadlines = count($Headlines);

$j= 0; 

while ($j <= $NumberOfElementsInHeadlines)
{   
    echo $Headlines[$j];
    $j= AddOneToANumber ($j); 
    echo "<br> <br>\n";
}

foreach($Headlines as $Headline)
{
    echo $Headline;
    $i++;
}

foreach($ArrayOfElements as $IndividualFromArrayOfElements)
{
    echo $Headline;
    $i++;
}






$n= 1; 

while ($n <= 10)

{
    echo $n;
    $n= $n +1;
    
}


$number = 1; 

while ($number <= 5)

{
    echo "Alexandra" . $number."\n";
    $number++;

}

$number = 100;

while ($number <= 500)

{
    echo $number."\n";
    $number= $number + 100;
}




function SquareANumber(int $i)
{
    return $i*$i;
}

$i = 2; 

while ($i < 100000000)

{
    echo number_format ($i) . "\n";
    $i = SquareANumber($i);
}

function SquareANumber2(int $i)

{
    return $i * $i;
}

while ($i <= 100000)

{
    echo $i . "\n";
    $i = SquareANumber($i);
}

$i = 2;

while ($i <= 100)

{
    echo $i."\n";
    $i = $i + 10;
}

$i = 4;

while ($i <= 100)

{
    echo $i."\n";
    $i = $i * 4;
}

$i = 20;

while ($i <= 60)

{
    echo $i."\n";
    $i = $i + $i;
}

$i = 4;

while ($i <= 48)

{
    echo "Alexandra"."\n";
    $i = $i * $i;
}





?>

