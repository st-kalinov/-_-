<?php
require 'database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Вход - Ветеринарен кабинет "САНИТУС" </title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/login.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <script>
        var recaptchacheck = false;    
        function recaptchaCallback() {
            recaptchacheck = true;    
        };

        $(document).ready(function() {

            $("#log").submit(function(e) {
                e.preventDefault();

                if(recaptchacheck == false) {
                    $("#alertMsg").text("Отбележете, че не сте робот !").hide().fadeIn(1000).fadeOut(4000);
                    grecaptcha.reset();
                    return;
                }
                else {
                    $("#messages").load('phpCheckPages/login_check.php', $("#log").serializeArray(), function() {
                        $("#log").trigger('reset');
                        grecaptcha.reset();
                        recaptchacheck = false;
                        $(this).show().fadeOut(7000);      
                        if(!$("#messages div").hasClass('alert')) {
                            window.location.replace("http://localhost/blzrx/%D0%94%D0%98%D0%9F%D0%9B%D0%9E%D0%9C%D0%9D%D0%90_site/index.php");
                        }

                        
                    });
                }
            });
            $("#links a:last-of-type").click(function() {
                $("#forgottenPassForm").show();
                $("main form:first-of-type").hide();
                $("main header h1").text("Забравена парола");
            });

            $("#forgottenPassForm button[type='button']").click(function() {
                $("main form:first-of-type").show();
                $("#forgottenPassForm").hide();
                $("main header h1").text("Вход");
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
                <h1>Вход</h1>
            </header>      
            <form id="log" class="col-sm-offset-3 col-sm-6">
                
                <label for="username" class="grey-text">Потребителско име или Email:</label>
                <input type="text" id="username" name="nameemail" class="form-control" placeholder='Потребителско име или Email' required><br>

                <label for="pass" class="grey-text">Парола:</label>
                <input type="password" id="pass" name="usrpass" class="form-control" placeholder="Парола на акаунта" required><br>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Вход</button>
                </div>
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-size: "compact" data-sitekey="6LdtrV0UAAAAAJ2pxv6NtWrj9iBYPbxmb4hejvfp"></div>  
                <div id="links">
                    <a class="forgotten" href="registration.php">Регистрация</a>
                    <a href="javascript:void(0)" class="forgotten">Забравена парола</a>
                </div>

                <p id="alertMsg"></p>
            </form>

            <form id="forgottenPassForm" class="col-sm-offset-3 col-sm-6" method="POST" action="">
                <label for="username1" class="grey-text">Потребителско име/Email на акаунта:</label>
                <input type="text" id="username1" name="nameemail" class="form-control" placeholder='Потребителско име или Email' required><br>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Изпрати</button>
                    <button class="btn brn-primary" type="button">Откажи</button>
                </div>
            </form>
            <div id="messages"></div>
        </div>
    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>