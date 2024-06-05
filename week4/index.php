<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        function getUsers() {
            $url = "users.json";
            $data = file_get_contents($url);
            // echo gettype($data);
            return json_decode($data, true);
        }

        $users = getUSers();

       
    ?>
    
    <div class="container">
        <h3>For Loops Data</h3>
        <div class="row">
                <?php
                 if (!empty($users)) {
                    for ($i = 0; $i < count($users); $i++) {
                        echo '
                        <div class="col-md-4">
                            <div class="card border-info mb-2 mt-2">
                                <div class="card-header bg-info-subtle">
                                    <h5 class="fw-bold text-primary-emphasis">' . $users[$i]['name'] . '</h5>
                                    <p class="card-text text-secondary">' . $users[$i]['email'] . '</p>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-subtitle text-info-emphasis fw-bold mb-2">Address</h6>
                                    <p class="card-text">' . $users[$i]['address']['street'] . ', ' . $users[$i]['address']['city'] . ' ' . $users[$i]['address']['suite'] . ', ' . $users[$i]['address']['zipcode'] . '</p>
                                    <p class="card-text"><span class="fw-bold">Phone: </span>' . $users[$i]['phone'] . '</p>
                                    <p class="card-text"><span class="fw-bold">Website: </span>' . $users[$i]['website'] . '</p>
                                    <h6 class="card-subtitle text-info-emphasis border-top fw-bold py-2">Company</h6>
                                    <p class="card-text mb-0">' . $users[$i]['company']['name'] . '</p>
                                    <small class="card-text"> - ' . $users[$i]['company']['catchPhrase'] . '</small>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
        </div>
    </div>

    <div class="container">
    <h3>Foreach Data</h3>
        <div class="row">
                <?php
                 if (!empty($users)) {
                    foreach ($users as $user){
                        echo '
                        <div class="col-md-4">
                            <div class="card border-success mb-2 mt-2">
                                <div class="card-header bg-success-subtle">
                                    <h5 class="fw-bold text-success-emphasis">' . $user['name'] . '</h5>
                                    <p class="card-text text-secondary">' . $user['email'] . '</p>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-subtitle text-success-emphasis fw-bold mb-2">Address</h6>
                                    <p class="card-text">' . $user['address']['street'] . ', ' . $user['address']['city'] . ' ' . $user['address']['suite'] . ', ' . $user['address']['zipcode'] . '</p>
                                    <p class="card-text"><span class="fw-bold">Phone: </span>' . $user['phone'] . '</p>
                                    <p class="card-text"><span class="fw-bold">Website: </span>' . $user['website'] . '</p>
                                    <h6 class="card-subtitle text-success-emphasis border-top fw-bold py-2">Company</h6>
                                    <p class="card-text mb-0">' . $user['company']['name'] . '</p>
                                    <small class="card-text"> - ' . $user['company']['catchPhrase'] . '</small>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
        </div>
    </div>
    
</body>
</html>