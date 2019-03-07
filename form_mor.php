<?php
session_start();

if (!isset($_SESSION['userbrid'])){
    header('Location: login_mor.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $userbrid =  $_SESSION['userbrid'];
        echo $userbrid;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/'.$userbrid,
    ));
    $resp = curl_exec($curl);
    $json = json_decode($resp, true);
    curl_close($curl);


$useremail = $json['user_emailID'];
$userpass = $json['user_password'];
$username = $json['user_name'];


        $empName = $_POST["employer_name"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $postalcode = $_POST["postalcode"];
        $phone = $_POST["phone"];

//        echo $useremail;
//        echo $userpass;
//        echo $username;
//        echo $empName;
//        echo $name;
//        echo $address;
//        echo $postalcode;
//        echo $phone;
    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/'.$userbrid;
        //Initiate cURL.

    echo $url;

        $ch = curl_init($url);

        //The JSON data.
        $postData = array(
            "user_emailID" => $useremail,
        "user_name"=> $username,
        "user_password" => $userpass,
"user_employer" => $empName,
"user_address" => $address,
"user_postalCode" => $postalcode,
"user_phoneNumber" => $phone,
             "user_salary"=> null,
        "user_empStartDate"=> null,
        "user_approvalStatus"=> null
        );

//Encode the array into JSON.
$jsonDataEncoded = json_encode($postData);
//
//echo $jsonDataEncoded;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
$result = curl_exec($ch);

    header('Location: consent_status.php');


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
    <title>Mortgage Broker Form</title>

    <style>
p {
  font-family: verdana;
  text-align: center;
  font-size: 10;
}
    </style>
</head>

<body>
<?php include "navbar.php" ?>
    <form action="" method="post">

        <div class="container">
                <label for="employerInfo"><p>Enter your employer name<p></label>
                <input type="text" placeholder="Employer Name" name="employer_name" required>
                        <br>             
                <label for="name"><p>Enter your name<p></label>
                <input type="text" placeholder="Name" name="name" required>
                        <br>
                <label for="address"><p>Enter your address<p></label>
                <input type="text" placeholder="Address" name="address" required>
                        <br>
                <label for="name"><p>Enter your postal code<p></label>
                <input type="text" placeholder="Postal Code" name="postalcode" required>
                        <br>   
                <label for="phone"><p>Enter your phone numSber<p></label>
                <input type="text" placeholder="Phone Number" name="phone" required>
                        <br>  
                        <br>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>