<?php

$chal = 600851475143;
$primes = array();

function isPrime($number) {
	$prime = true;

	for ($i = 2; $i < $number; $i++)
	{
		if ($number % $i == 0)
		{
			$prime = false;
			break;
		}
	}

	return $prime;
}

for ($factor = 1; $factor <= $chal; $factor++) { 
	if ($chal % $factor == 0) {
		if (isPrime($factor) == true) {
			array_push($primes, $factor);
			echo "{$factor} is a prime factor of {$chal}\n";
		}
	} else {
	}
}



echo end($primes) . " is the largest prime" . PHP_EOL;








?>
