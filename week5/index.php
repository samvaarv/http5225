<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQL and MySQL</title>
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', '', 'http5225-week5');

        if(!$connect) {
            echo 'Error code: ' . mysqli_connect_errno();
            echo 'Error code: ' . mysqli_connect_error();
            exit;
        }

        $query = 'SELECT `Name`, `Hex` FROM colors';
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo 'Error Message: ' . mysqli_error($connect);
            exit;
        } else {
            echo 'The query found ' . mysqli_num_rows($result);
        }
        foreach ($result as $item) {
            echo '<div style="margin-bottom: 10px; padding: 8px; display: flex; align-items: center; border: 1px solid ' . $item['Hex'] . '; border-radius: 10px;">
                    <div style="height: 20px; width: 20px; display: inline-block; border-radius: 5px; margin-right: 10px; background-color:' . $item['Hex'] . '">
                    </div>
                    <span>' . $item['Name'] . '</span>
                </div>';
        }
    ?>
</body>
</html>