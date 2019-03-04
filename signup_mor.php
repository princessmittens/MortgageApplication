<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $url = 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/';

    //Initiate cURL.
    $ch = curl_init($url);

    //The JSON data.
    $postData = array(
        "user_emailID" => $email,
        "user_name" => $uname,
        "user_password" => $pass,

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
    <title>SignUp</title>

    <style>
p {
  font-family: verdana;
  text-align: center;
}
    </style>
</head>

<body>
    <form action="" method="post">

        <div class="container">
                <label for="email"><b><p>Enter your email</b><p></label>
                <input type="text" placeholder="Enter your email" name="email" required>
                        <br><br>      
                <label for="username"><b><p>Create a username</b><p></label>
                <input type="text" placeholder="Enter a username" name="uname" required>
                        <br><br>                                        
                <label for="pass"><p><b>Create a password</b><p></label>
            <input type="password" placeholder="Create a password" name="pass" required>
            <br> <br>
            <button type="submit">Sign Up</button>
        </div>
    </form>
</body>

</html>