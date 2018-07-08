<?php
include 'database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Услуги - Ветеринарен кабинет "САНИТУС" </title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/health_goodsCss.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
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
        <?php

            $subtype_good = $_GET['subgood'];
            health_good($subtype_good);
        ?>
        </div>
    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>