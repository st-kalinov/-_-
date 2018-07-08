<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8" >
	<title>Контакти - Ветеринарен кабинет "САНИТУС" </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">    
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/contact.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">	
	<script src="scripts.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var recaptchacheck = false;    
        function recaptchaCallback() {
            recaptchacheck = true;           
        };
        
    $(document).ready(function() {
        $("form").submit(function(e) {
            e.preventDefault();
            if(recaptchacheck == false)
            {
                $("#messages").text("");
                $("#alertMsg").text("Отбележете, че не сте робот !").hide().fadeIn(1000).fadeOut(4000);
                grecaptcha.reset();
              
            }
            else {
                
                $("#messages").load("phpCheckPages/checkQuestion.php", $("form").serializeArray(), function() {
                    $("form").trigger('reset');
                    grecaptcha.reset();
                    recaptchacheck = false;
                    $("#messages").show();
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
			<h1>Контакти</h1>
        </header>
        <section class="col-sm-4">
            <h3>Задайте своя въпрос:</h3>
            <form>
                <p>* Задължителни полета</p>
                <div class="form-group">
                    <label for="formCtrlName">Име: <span>*</span></label>
                    <?php
                        if(isset($_SESSION['flname'])) {
                            $names = $_SESSION['flname'];
                            echo "<input type=\"text\" class=\"form-control\" id=\"formCtrlName\" name=\"name\" placeholder=\"Име\" value='".$names."' required>";
                        }
                        else
                            echo '<input type="text" class="form-control" id="formCtrlName" name="name" placeholder="Име" required>';

                    ?>
                    <label for="formCtrlEmail">Email адрес: <span>*</span></label>
                    <?php

                        if(isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            echo "<input type=\"email\" class=\"form-control\" id=\"formCtrlEmail\" name=\"email\" placeholder=\"Email адрес за отговор\" value='".$email."' required>";
                        }
                        else
                            echo "<input type=\"email\" class=\"form-control\" id=\"formCtrlEmail\" name=\"email\" placeholder=\"Email адрес за отговор\" required>";
                    ?>
                    <label for="formCtrlTheme">Тема: <span>*</span></label>
                    <input type="text" class="form-control" id="formCtrlETheme" name="theme" placeholder="Тема на въпроса" required>
                    <label for="formCtrlQuestion">Въпрос: <span>*</span></label>
                    <textarea name="question" class="form-control" id="formCtrlQuestion" rows="7" cols="30" placeholder="Вашият въпрос" required></textarea>                
                    <button type="submit" class="btn btn-primary btn-block">Изпрати</button>
                </div>
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-size: "compact" data-sitekey="6LdtrV0UAAAAAJ2pxv6NtWrj9iBYPbxmb4hejvfp"></div>      
                <p id="alertMsg"></p>
            </form>
            <div id="messages"></div>
        </section>
        <section class="col-sm-6 col-sm-offset-2">
            <address>
                <h3>Адрес, телефон и email за връзка:</h3>
                <p><i class="material-icons">location_on</i> ж.к Вл. Варненчик, пазар над бл. 20</p>
                <p><i class="material-icons">phone</i> +359 382 312 534</p>
                <p><i class="material-icons">phone_iphone</i> 0889 324125</p>
                <p><i class="material-icons">email</i> sanitus@abv.bg</p>
            </address>  
            <h3>Работно време:</h3>        
            <ul>           
                <li>Понеделник - Петък <span>9:00 - 19:30</span></li>
                <li>Събота <span>10:00 - 19:00</span></li>
                <li>Неделя <span>10:00 - 16:00</span></li>
            </ul>
            <h3>Местоположение:</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d480.5098783670251!2d27.849269398708035!3d43.24922884684417!2m2!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDE0JzU3LjAiTiAyN8KwNTAnNTcuOCJF!5e1!3m2!1sbg!2sus!4v1525795279336" width="600" height="450" frameborder="0" allowfullscreen></iframe>
        </section> 
    </div>
    </main>
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>       
</div>
</body>
</html>