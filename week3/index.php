<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEEK 2</title>
</head>
<body>
	<?php
		echo '<h1>Time Checker</h1>';
		$rand = rand(1, 24);
		echo $rand;

		if($rand >= 0 && $rand < 12) {
			echo "Good Morning!!!";
		} elseif($rand >= 12 && $rand <= 16) {
			echo "Good Afternoon!!!";
		} else if($rand > 16 && $rand <=20) {
			echo "Good Evening!!!";
		} else {
			echo "Good Night!!!";
		}
	?>
	<?php
		echo '<h1>Magic Number Game</h1>';
		$number = rand(1, 100);
		echo '<h2>The number is ' . $number . '</h2>';

		if($number % 3 == 0 && $number % 5 == 0) {
			echo "This number is FIZZBUZZ";
		} elseif($number % 5 == 0) {
			echo "The number is BUZZ";
		} else if($number % 3 == 0) {
			echo "The number is FIZZ";
		} else {
			echo "This number is neither...";
		}
	?>
</body>
</html>