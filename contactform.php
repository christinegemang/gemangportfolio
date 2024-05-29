<?php

$con = mysqli_connect('localhost','root','','portfolio5');

$fullnamee = "";
$email = "";
$mobile = "";
$emailsub = "";
$messages = "";
$error_Message = "";
$success_Message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $emailsub = $_POST["emailsub"];
    $messages = $_POST["messages"];
    
do {
    if (empty($fullname) || empty($email)) {
        $errorMessage = "All Fields are Required!";
        break;
    }


    $sql = "INSERT INTO contacts (fullname, email, mobile, emailsub, messages) VALUES ('$fullname', '$email', '$mobile', '$emailsub', '$messages')";
    $result = $con->query($sql);

    if (!$result) {
        $errorMessage = "Invalid Query: " . $con->error;
        break;
    }


    $fullname = "";
    $email= "";
    $success_Message = "Message Sent";

    header("location: index.html");
    exit;

}while (false);
}





?>