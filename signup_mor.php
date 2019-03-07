<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];



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
        "user_emailID" => $email,
        "user_name" => $uname,
        "user_password" => $pass,
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

    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //Execute the request
    $result = curl_exec($ch);

    header('Location: login_mor.php');

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
}
    </style>
</head>

<body>
<?php include "navbar.php" ?>
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


            <br> <br>
            <button type="submit">Sign Up</button>
        </div>
    </form>
</body>

</html>