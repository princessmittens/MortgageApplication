<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["username"];
    $pass = $_POST["pass"];
    echo 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/email/'.$email;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://brokerapi.herokuapp.com/mortagageBroker/usersAtBroker/email/'.$email,
    ));
    $resp = curl_exec($curl);
    $json = json_decode($resp, true);
    curl_close($curl);
    if($pass == $json['user_password']){
//        if($json['user_employer']!=null)
//        {
//            $_SESSION['userbrid'] = $email;
//            header('Location: consent_status.php');
//        }
//        else
//        $_SESSION['userbrid'] = $email;
//        header('Location: form_mor.php');

        $_SESSION['userbrid'] = $email;
            header('Location: consent_status.php');
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
    <title>Login</title>
    <style>
p {
  font-family: verdana;
  text-align: center;
}
    </style>
</head>
<body>
<?php include "navbar.php" ?>
    <form action="" method="post">
        <div class="container">
            <label for="username"><b><p>Username</b><p></label>
            <input type="text" placeholder="Enter email" name="username" required>
                    <br><br>
            <label for="pass"><p><b>Password</b><p></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            <br> <br>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>