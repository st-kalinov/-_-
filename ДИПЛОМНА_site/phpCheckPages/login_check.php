<?php
include '../database.php';

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']) ) {
    $nameemail = $_POST['nameemail'];
    $pass = $_POST['usrpass'];

    $nameemail = cleanData($nameemail);
    $pass = cleanData($pass);
    $pass = passHash($pass);

    $sqlQuery = "SELECT `id`, `username`, `email`, `acc_condition`, `flname` from `accounts` where (`username` = '$nameemail' and `password` = '$pass') OR (`email` = '$nameemail' and `password` = '$pass')";
    $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

    if(mysqli_num_rows($result) > 0) {


        $user = mysqli_fetch_array($result);

        if($user['acc_condition'] != 'blocked') {
            session_start();
            $_SESSION['user'] = $user['username'];
            $_SESSION['userid'] = $user['id'];
            $_SESSION['flname'] = $user['flname'];
            $_SESSION['email'] = $user['email'];

        }
        else {
            echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
            <strong>Акаунтът, с който се опитвате да влезете е блокиран заради непотвърдени записвания за час !</strong>
            </div>";
        }

    }

    else if(mysqli_num_rows($result) == 0) {
        echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
            <strong>Грешно потребителско име и/или парола !</strong>
        </div>";
    }
    else {
        echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
            <strong>Възникнва неочаквана грешка !</strong>
        </div>";
    }
}
else {
    echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
    <strong>Вие сте робот !</strong>
    </div>";
}

?>