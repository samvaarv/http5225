<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEEK 2</title>
</head>
<body>
	<?php
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
</body>
</html>