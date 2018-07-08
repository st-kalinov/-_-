<?php
include 'database.php';
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
    <link rel="stylesheet" href="cssFiles/mainCss/health_goods_all.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <script>
        $(document).ready(function() {
            $("li.first").on('click', function() {
                $(this).children("ul").toggle();
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
        <header class='col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1'>
            <h1>Услуги</h1>
        </header>
        <section class='col-sm-12'>
        <figure class='col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10'><img src='images/sanitusUslugiImg.png' /></figure>
        <article class='col-sm-offset-1 col-sm-6 col-xs-offset-1 col-xs-10'>
            <ul>
                <li class="first">Профилактика <i class="fas fa-angle-down"></i>
                    <ul>
                        <li><a href="health_goods.php?subgood=Вътрешно обезпаразитяване">Вътрешно обезпаразитяване</a></li>
                        <li><a href="health_goods.php?subgood=Външно обезпаразитяване">Въшно обезпаразитяване</a></li>
                        <li><a href="health_goods.php?subgood=Ваксинации">Ваксинации</a></li>
                    </ul>
                </li>
                <li class="first">Лечение <i class="fas fa-angle-down"></i>
                    <ul>
                        <li><a href="health_goods.php?subgood=Паразитни заболявания">Паразитни заболявания</a></li>
                        <li><a href="health_goods.php?subgood=Инфекциозни заболявания">Инфекциозни заболявания</a></li>
                        <li><a href="health_goods.php?subgood=Вътрешни болести">Вътрешни болести</a></li>
                    </ul>
                </li>
                <li class="first">Акушерство, гинекология <i class="fas fa-angle-down"></i>
                    <ul>
                        <li><a href="health_goods.php?subgood=Бременност, раждане и гинекология">Бременност, раждане и гинекология</a></li>
                        <li><a href="health_goods.php?subgood=Установяване и проследяване на бременността">Установяване и проследяване на бременността</a></li>
                        <li><a href="health_goods.php?subgood=Асистирано раждане">Асистирано раждане</a></li>
                        <li><a href="health_goods.php?subgood=Цезарово сечение">Цезарово сечение</a></li>
                        <li><a href="health_goods.php?subgood=Изкуствено осеменяване">Изкуствено осеменяване</a></li>
                    </ul>
                </li>
                <li class="first">Лаборатории <i class="fas fa-angle-down"></i>
                    <ul>
                        <li><a href="health_goods.php?subgood=Хематологични изследвания">Хематологични изследвания</a></li>
                        <li><a href="health_goods.php?subgood=Биохимични изследвания">Биохимични изследвания</a></li>
                        <li><a href="health_goods.php?subgood=Микроскопски изследвания">Микроскопски изследвания</a></li>
                        <li><a href="health_goods.php?subgood=Бързи тестове">Бързи тестове</a></li>
                    </ul>
                </li>
                <li class="first"><a class="links" href="health_goods.php?subgood=Хирургия">Хирургия</a></li>
                <li class="first"><a class="links" href="health_goods.php?subgood=Онкологични заболявания">Онкологични заболявания</a></li>
                <li class="first"><a class="links" href="health_goods.php?subgood=Дерматология">Дерматология</a></li>
                <li class="first"><a class="links" href="health_goods.php?subgood=Образна диагностика">Образна диагностика</a></li>

            </ul>
        </article>
        </section>
    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>