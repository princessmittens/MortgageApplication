<?php
session_start();
if (!isset($_SESSION['userempid'])){
    header('Location: login_emp.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!isset($_POST["consent"]))
    {
        header('Location: consenterror_emp.php');
    }
    $morid = $_POST["morNo"];
    $baddress = $_POST["brokerAddress"];

    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $morid;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/' . $morid,
    ));
    $resp = curl_exec($curl);
    $json = json_decode($resp, true);
    curl_close($curl);
    if ($json['user_address'] == $baddress) {


        $useremail = $json['user_emailID'];
        $userpass = $json['user_password'];
        $username = $json['user_name'];
        $empName = $json['user_employer'];
        $address = $json['user_address'];

        $postalcode = $json['user_postalCode'];
        $phone = $json['user_phoneNumber'];

        //Initiate cURL.
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
            "id" => $morid,
            "user_empStartDate"=> null,
            "user_approvalStatus"=> 'APPROVED'
        );
//Encode the array into JSON.
        $jsonDataEncoded = json_encode($postData);
//Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//Execute the request
        $result = curl_exec($ch);

        header('Location: consentsuccess_emp.php');
    }
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
    <title>SignUp</title>

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
                <label for="moreNo"><p>Enter your mortgage ID<p></label>
                <input type="text" placeholder="Mortgage ID" name="morNo" required>
                        <br>
                <label for="brokerAddress"><p>Enter the web address of the Mortgage Broker<p></label>
                <input type="text" placeholder="Broker Address" name="brokerAddress" required>
                        <br>                                     
                <label for="consent" ><p>I consent to fowarding my application the mortgage broker</label>
            <input type="checkbox" placeholder="consent" name="consent">
            <br> <br>
            <button type="submit">Agree</button>
        </div>
    </form>
</body>

</html>