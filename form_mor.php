<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $empName = $_POST["employer_name"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $postalcode = $_POST["postalcode"];
        $phone = $_POST["phone"];

    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/';
        //Initiate cURL.
        $ch = curl_init($url);

        //The JSON data.
        $postData = array(
"user_employer" => $empName,
"empLastName" => $name,
"user_address" => $address,
"user_postalCode" => $postalcode,
"user_phoneNumber" => $phone
        );

//Encode the array into JSON.
$jsonDataEncoded = json_encode($postData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
$result = curl_exec($ch);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
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