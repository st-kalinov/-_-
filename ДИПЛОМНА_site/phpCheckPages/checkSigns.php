<?php
    include "../database.php";

    if(isset($_POST['response']) && !empty($_POST['response'])) {

        $secret = '6LdtrV0UAAAAANT5Nrb44bLHCMs5Xkgx_dieYcDR';
        $re = $_POST['response'];
        $animal = $_POST['animal'];
        $sign_for = $_POST['good'];
        $date = $_POST['date'];
        $free = $_POST['free_hours'];
        $info = $_POST['info'];
        $info = cleanData($info);
        $userid = $_POST['user'];

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
            $sqlQuery = "INSERT into `online_signs` (`acc_id`, `date`, `hour`, `animal`, `type`, `info`, `confirmed`) VALUES ($userid, '$date', '$free', '$animal', '$sign_for', '$info', 'изчакване')";
            $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
        
            if($result) {
               echo "<div class='alert alert-success col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
                    <strong>Заявката Ви беше изпратена успешно ! Очаквайте обаждане до 15 мин.</strong> 
                </div>";
            }
            else {
                echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
                <strong>Неуспешно изпратена заявка, моля опитайте по-късно !</strong> 
                </div>";
            }
        }
    }
    else {
        echo "<div class='alert alert-danger col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10'>
        <strong>Вие сте робот !</strong> 
        </div>";
    }
 




?>