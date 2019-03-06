<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["username"];
    $pass = $_POST["pass"];
    echo 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/'.$email;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/'.$email,
    ));
    $resp = curl_exec($curl);
    $json = json_decode($resp, true);
    curl_close($curl);
    if($pass == $json['user_password']){

        $_SESSION['userbrid'] = $email;
        header('Location: form_mor.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
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
            <label for="username"><b><p>Username</b><p></label>
            <input type="text" placeholder="Enter Username" name="username" required>
                    <br><br>
            <label for="pass"><p><b>Password</b><p></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            <br> <br>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>