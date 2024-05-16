<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 2</title>
</head>
<body>    
    <?php
    echo '<h1>PHP Output and Variables</h1>';
    echo '<p>Learning how to work with variables in PHP</p>';
    echo '<ul>
            <li>Variables</li>
            <li>Output PHP</li>
        </ul>'
    ?>
    
    <img src="<?php echo 'https://plus.unsplash.com/premium_photo-1675440682547-d3be56f91621?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' ?>" width="50%" alt="">
    <?php
    $fname = 'Samvaarv';
    $lname = 'Shrestha';

    $name['fname'] = 'Sumin';
    $name['lname'] = 'Shrestha';

    echo $name['fname'] . ' ' . $lname;
    ?>
</body>
</html>