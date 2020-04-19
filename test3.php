<?php


$CountriesLivedIn = ['Switzerland', 'United States', 'Argentina', 'Chile', 'Venezuela', 'India'];

$NumberOfCountriesLivedIn = count ($CountriesLivedIn);

$i = 0;

while ($i <= $NumberOfCountriesLivedIn)

{
    echo $CountriesLivedIn[$i]."\n";
    $i = $i + 1;
}

?>