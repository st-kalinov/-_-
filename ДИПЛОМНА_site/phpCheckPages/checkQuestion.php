<?php
include '../database.php';


if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6LdtrV0UAAAAANT5Nrb44bLHCMs5Xkgx_dieYcDR';
    $re = $_POST['g-recaptcha-response'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tema = $_POST['theme'];
    $question = $_POST['question'];

    $name = cleanData($name);
    $email = cleanData($email);
    $tema = cleanData($tema);
    $question = cleanData($question);
    $date = date("Y-m-d H:i:s");

    //vzeto ot stackoverflow
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
    //krai na stackoverflow

    if($response && $response->success) {
        $sqlQueryCheck = "SELECT `id`, `email`, `acc_condition` from `accounts` where `email` = '{$email}' AND `acc_condition` != 'blocked'";
        $result = mysqli_query($link, $sqlQueryCheck) or die(mysqli_error($link));
        if(mysqli_num_rows($result) > 0) {
    
            while($row = mysqli_fetch_array($result)) {
                $acc_id = $row['id'];
            }
            $sqlQueryInsert = "INSERT into `questions` (`name`, `email`, `topic`, `question`, `date`, `acc_id`) values ('$name', '$email', '$tema', '$question', '$date', $acc_id)";
        }
        else {
            $sqlQueryInsert = "INSERT into `questions` (`name`, `email`, `topic`, `question`, `date`, `acc_id`) values ('$name', '$email', '$tema', '$question', '$date', null)";
        }
    
        $result2 = mysqli_query($link, $sqlQueryInsert) or die(mysqli_error($link));
    
        if($result2) {
            echo "<div class='alert alert-success col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
                    <strong>Въпросът беше изпратен успешно ! Очаквайте отговор до 24 часа.</strong> 
                </div>";
        }
    }
    else {
        echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
            <strong>Неуспешно изпратен въпрос, моля опитайте по-късно !</strong> 
        </div>";
    }

}
else {
    echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
        <strong>Вие сте робот !</strong> 
    </div>";
}

?>
