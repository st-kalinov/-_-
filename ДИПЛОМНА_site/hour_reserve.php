<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Запазване на час - Ветеринарен кабинет "САНИТУС" </title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/hour_reserveCss.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="scripts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.bg.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script>
        var recaptchacheck = false;    
        function recaptchaCallback() {
            recaptchacheck = true;           
        };

        $(document).ready(function() {
            var todayDate = new Date().getDate();
            var endDate = new Date(new Date().setDate(todayDate + 20));
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container =  "body";
            var options= {             
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                language: "bg",
                startDate: "dateToday",
                endDate: endDate,
            };

            date_input.datepicker(options).on("changeDate", function () {       
               var date = $(this).val();    
               $("#signsTable").load("phpCheckPages/show_signs.php", {'data': date });
            });
           
            $("form").submit(function(e) {
                e.preventDefault();
                if(recaptchacheck == false)
                {
                    $("#alertMsg").text("Отбележете, че не сте робот !").hide().fadeIn(1000).fadeOut(4000);
                    grecaptcha.reset();
                }
                else {
                    $animal = $("select[name='animal']").val();
                    $sign_for = $("select[name='good']").val();
                    $date = $("input[name='date']").val();
                    $hour = $("select[name='free_hours']").val();
                    $info = $("textarea").val();
                    $user = $("#hiddenUserId").text();
                    $response = grecaptcha.getResponse();

                    if($animal == "none" || $sign_for == "none" || $date == "" ) {
                        $("#alertMsg").text("Моля, попълнете всички задължителни полета !");
                        grecaptcha.reset();
                        recaptchacheck = false;  
                    }
                    else {
                        $("#messages").load("phpCheckPages/checkSigns.php", {'animal': $animal, 'good': $sign_for, 'date': $date, 'free_hours': $hour, 'info': $info, 'user': $user, 'response': $response}, function() {
                        $("form").trigger('reset');
                        grecaptcha.reset();
                        recaptchacheck = false;
                        $("#messages").show().fadeOut(15000);
                        });
                    }
                    

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
    <?php
        if(!isset($_SESSION['userid'])) {
            echo "<main>";
            echo "<header class='col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1'><h2>Функцията е достъпна само при наличието на потребителски акаунт.</h2></header>";
            echo "<div id='links' class='col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2'>
                    <a href='registration.php'>Регистрация</a>
                    <a href='login.php'>Вход</a>
            </div>";
            echo "</main>";
            require('templates/footer.html');
            exit;           
        }
    ?>
    <main>
        <div class="row">
            <header class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                <h1>Запазване на час</h1>
            </header>      
            <form class="col-sm-offset-3 col-sm-6">        
                <p class="col-sm-12">* задължителни полета !</p>
                
                <label for="animalType" class="grey-text">Животно: <span class="req">*</span></label>
                <select id="animalType" class="form-control" name="animal">
                    <option selected value="none">--- Изберете животно ---</option>
                    <option value="куче">Куче</option>
                    <option value="котка">Котка</option>
                </select><br>
                <label for="forGood" class="grey-text">Записване за: <span class="req">*</span></label>
                <select id="forGood" class="form-control" name="good">
                    <option selected value="none">--- Изберете услуга ---</option>
                    <option value="Преглед">преглед</option>
                    <option value="Ваксинация">ваксинация</option>
                    <option value="Подстрижка">подстрижка</option>
                    <option value="Кастрация">кастрация</option>
                    <option value="Чипиране">чипиране</option>
                </select><br>
                <div class="form-group">
                    <label class="control-label" for="date">Избор на дата: <span class="req">*</span></label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                </div>
                <div id="signsTable">
                    
                </div>
                <div class="form-group">
                    <label for="information">Допълнителна информация: </label>
                    <textarea name="info" class="form-control" id="information" rows="7" cols="30" placeholder="Допълнителна информация, която е смятате, че ще е важна за нашия екип"></textarea>  
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Записване</button>
                </div>
                <?php
                echo "<p id='hiddenUserId'>$_SESSION[userid]</p>";
                ?>
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-size: "compact" data-sitekey="6LdtrV0UAAAAAJ2pxv6NtWrj9iBYPbxmb4hejvfp"></div>   
                <p id="alertMsg"></p>
            </form>
            <div id="messages">
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