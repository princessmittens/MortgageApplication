<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $morid = $_POST["morNo"];
    $baddress = $_POST["brokeraddress"];

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
        //Initiate cURL.
        $ch = curl_init($url);
        //The JSON data.
        $postData = array(
            "user_approvalStatus" => 'APPROVED'
        );
//Encode the array into JSON.
        $jsonDataEncoded = json_encode($postData);
//Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_PUT, 1);
//Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//Execute the request
        $result = curl_exec($ch);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
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
    <form action="" method="post">

        <div class="container">
                <label for="moreNo"><p>Enter your mortgage ID<p></label>
                <input type="text" placeholder="Mortgage ID" name="morNo" required>
                        <br>
                <label for="brokerAddress"><p>Enter the web address of the Mortgage Broker<p></label>
                <input type="text" placeholder="Broker Address" name="brokerAddress" required>
                        <br>                                     
                <label for="consent" ><p>I consent to fowarding my application the mortgage broker</label>
            <input type="checkbox" placeholder="consent" name="consent" required>
            <br> <br>
            <button type="submit">Agree</button>
        </div>
    </form>
</body>

</html>