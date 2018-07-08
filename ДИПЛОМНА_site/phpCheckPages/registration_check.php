<?php
include '../database.php';

if(isset($_POST['usrname']) && isset($_POST['usremail']) && isset($_POST['usrflnames']) && isset($_POST['usrpass']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6LdtrV0UAAAAANT5Nrb44bLHCMs5Xkgx_dieYcDR';
    $re = $_POST['g-recaptcha-response'];

    $firstlastn = cleanData($_POST['usrflnames']);
    $mail = cleanData($_POST['usremail']);
    $username= cleanData($_POST['usrname']);
    $password = cleanData($_POST['usrpass']);
    $tel = cleanData($_POST['usrtelnumber']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret'   => $secret,
        'response' => $re,
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    
    $response = @json_decode($data);

    if($response && $response->success) { 
        $sqlQuery = "SELECT `id` from `accounts` WHERE `username` = '{$username}' OR `email` = '{$mail}'";
        $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
        if(mysqli_num_rows($result) > 0) {
            echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
                    <strong>Вече има потребителски акаунт с това име и/или email !</strong>
            </div>";
        }
        else {
            $password = passHash($password);
            $sqlQuery = "INSERT INTO `accounts` (`username`, `flname`,	`email`, `password`, `telnumber`, `acc_type`, `acc_condition`) 
            VALUES ('$username', '$firstlastn', '$mail', '$password', '$tel', 'user', 'good')";   
            $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
            echo "<div class='alert alert-success col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
                    <strong>Регистрацията е успешна !</strong>
            </div>";
         }
    }
    else {
        echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
        <strong>Вие сте робот !</strong>
        </div>";
    }



}

?>