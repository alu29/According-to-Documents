<?php


$CountriesLivedIn = ['Switzerland', 'United States', 'Argentina', 'Chile', 'Venezuela', 'India'];

$NumberOfCountriesLivedIn = count ($CountriesLivedIn);

$i = 0;

while ($i <= $NumberOfCountriesLivedIn)

{
    echo substr("CountriesLivedIn",3);
    echo $CountriesLivedIn[$i]."\n";
    $i = $i + 1;
}

?>