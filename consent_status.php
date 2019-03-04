<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $morid = $_SESSION['morid'];

    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $morid;


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $morid,

    ));

    $resp = curl_exec($curl);
    $json = json_decode($resp, true);



    curl_close($curl);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Status</title>

    <style>
        p {
            font-family: verdana;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h1 name="statusconsent">Current status of your application is: <?php echo $json['user_approvalStatus']?></h1>
</div>
</body>

</html>