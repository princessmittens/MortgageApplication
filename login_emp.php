<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$empId = $_POST["empID"];
$pass = $_POST["pass"];

echo 'https://employer-api.herokuapp.com/Employer/Employee/'.$empId;
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://employer-api.herokuapp.com/Employer/Employee/'.$empId,

));

$resp = curl_exec($curl);
$json = json_decode($resp, true);



curl_close($curl);

    if($pass == $json['employee_password']){

        $_SESSION['userempid'] = $empId;
        header('Location: consentform_emp.php');

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
            <label for="empID"><b><p>EmployeeID</b><p></label>
            <input type="text" placeholder="EmployeeID" name="empID" required>
                    <br><br>
            <label for="pass"><p><b>Password</b><p></label>
            <input type="password" placeholder="Password" name="pass" required>
            <br> <br>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>