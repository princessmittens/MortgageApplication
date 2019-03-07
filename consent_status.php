<?php
session_start();

if (!isset($_SESSION['userbrid'])){
    header('Location: login_mor.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $morid = $_SESSION['morid'];
//    $morid = $_POST['morid'];
    $userbrid =  $_SESSION['userbrid'];
    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $userbrid;


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $userbrid,

    ));

    $resp = curl_exec($curl);
    $json = json_decode($resp, true);


    curl_close($curl);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8">
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
<?php include "navbar.php" ?>

<div class="container">
    <form action="" method="post">

        <div class="container">

            <h1 name="statusconsent">Current status of your application is: <?php if($json['user_approvalStatus'] == 'APPRIVED'){echo 'APPROVED';} else {echo 'PENDING';} ?></h1>
<!--            <label for="moreNo"><p>Enter your mortgage ID<p></label>-->
<!--            <input type="text" placeholder="Mortgage ID" name="morid" required>-->
<!--            <button type="submit">Agree</button>-->

            <h3>Your application id is: <?php echo $json['user_ID'] . " Go to employer website and fill out the consent form. " .$json?></h3>
        </div>
    </form>

</div>
</body>

</html>