<?php
require 'database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Регистрация - Ветеринарен кабинет "САНИТУС" </title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/registration.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="scripts.js"></script>
    <script>
        var recaptchacheck = false;    
        function recaptchaCallback() {
            recaptchacheck = true;           
        };
        
        $(document).ready(function() {

            $("form").submit(function(e) {
                e.preventDefault();
                $username = $("#username").val();
                $pass = $("#pass").val();
                $telnumber = $("#number").val();
                $intRegex = /[0-9 -()+]+$/;

                if(recaptchacheck == false) {
                    $("#alertMsg").text("Отбележете, че не сте робот !").hide().fadeIn(1000).fadeOut(4000);
                    grecaptcha.reset();
                    return;
                }
                else if($telnumber.length != 10 || !($intRegex.test($telnumber.length))) {
                    $("#alertMsg").html("Моля, въведе коректен телефонен номер !").show().fadeOut(3500);
                }
                else {
                    $("#resultMsg").load("phpCheckPages/registration_check.php", $("form").serializeArray(), function() {
                        $("form").trigger('reset');
                        grecaptcha.reset();
                        recaptchacheck = false;
                        $(this).show().fadeOut(7000);                  
                    });
                }
        });

    });
    </script>
</head>

<body>
<div class="container-fluid">
    <?php
        /* ---------------- CONTACTS TOP ---------------- */
        require('templates/contacts.html');
        /* ---------------- HEADER ----------------*/
        require('templates/header.html');
        /* ---------------- NAVIGATION ----------------*/
        require('templates/nav.php');
	?>
    <main>
        <div class="row">
            <header class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                <h1>Регистрация</h1>
            </header>      
            <form class="col-sm-offset-3 col-sm-6">        
                <p class="col-sm-12">* задължителни полета !</p>
                
                <label for="username" class="grey-text">Потребителско име:<span class="req">*</span></label>
                <input type="text" id="username" name="usrname" class="form-control" placeholder="Потребителско име - минимум 4 символа" required minlength=4><br>

                <label for="userEmail" class="grey-text">Email:<span class="req">*</span></label>
                <input type="email" id="userEmail" name="usremail" class="form-control" placeholder="Email за връзка" required><br>

                <label for="pass" class="grey-text">Парола:<span class="req">*</span></label>
                <input type="password" id="pass" name="usrpass" class="form-control" placeholder="Парола - минимум 6 символа" required minlength=6><br>

                <label for="imena" class="grey-text">Име и фамилия:<span class="req">*</span></label>
                <input type="text" id="imena" name="usrflnames" class="form-control" placeholder="Вашето име и фамилия" required><br>

                <label for="number" class="grey-text">Мобилен номер:<span class="req">*</span></label>
                <input type="text" id="number" name="usrtelnumber" class="form-control" placeholder="Мобилен телефонен номер за връзка" required><br>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Регистрация</button>
                </div>
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-size: "compact" data-sitekey="6LdtrV0UAAAAAJ2pxv6NtWrj9iBYPbxmb4hejvfp"></div>  
                <p id="alertMsg"></p>
            </form>
            <div id="resultMsg">
            </div>
        </div>
    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>