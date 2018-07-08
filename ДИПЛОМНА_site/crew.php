<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8" >
	<title>Екип - Ветеринарен кабинет "САНИТУС" </title> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/crew.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">	
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<script src="scripts.js"></script>
   
   <script>
	   /*
	$(document).ready(function() { 
		$("h3").click(function () {
			var asd = $(this).text();
			console.log (asd);
		});
	});
	*/
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
			<h1>Екип</h1>
		</header>
        <div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="images/lekar1.jpg" />
				</div>
				<div class="col-sm-9">
					<h3>Д-р Богдан Филипов</h3>
					<p>Д-р Богдан Филипов – роден през 1972 г. в гр. Пазарджик . 
						През 1991 г. Завършва Техникум по ветеринарна медицина "Иван П. Павлов" гр. Стара Загора, от 1993 до 1995 учи зооинженерство, 
						а от 1995 до 2001г. е студент във ветеринарномедицинския факултет на Тракийски университет – гр. Стара Загора.<br>
						До създаването на „Ветеринарен кабинет Санитус" е работил в ДЗС гр.Пазарджик – ветеринарен техник, Районен център за селекция и 
						репродукция гр. Пазарджик – техник-осеменител, Ветеринарен кабинет „Диана” – гр.Варна ветеринарен лекар, „Stable of Excellence” – Luxembourg, 
						базирана в Германия – жокей и подковач.<br>
						Също така има 18-годишна спортна кариера в конния спорт, като състезател по прескачане на препятствия – бил е републикански шампион във всички 
						класове и призьор от международни състезания.<br>
						Има специализирани интереси в областите: паразитология, ехография , хирургия и вътрешни болести.
					</p>
				</div>
			</div><hr>
			<div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="images/lekar2.jpg" />
				</div>
				<div class="col-sm-9">
					<h3>Д-р Дарина Филипова</h3>
					<p>Д-р Дарина Филипова – родена през 1978г. в гр.Варна. 
					   Завършва III природо-математическа гимназия в гр. Варна, а след това факултета по ветеринарна медицина на Тракийски университет 
					   гр. Стара Загора през 2003 г.<br>
					   През 2004 г заедно със съпруга си създават ветеринарна аптека, а по-късно и „Ветеринарен кабинет Санитус”, където работи до момента.<br>
					   Има специализирани интереси в областите: стоматология, вътрешни болести и дерматология.
					</p>
				</div>			
			</div><hr>
			<div class="row">
				<div class="col-sm-3">
					<img class="img-responsive" src="images/lekar3.jpg" />
				</div>
				<div class="col-sm-9">
					<h3>Д-р Ирина Илиева</h3>
					<p>Д-р Ирина Илиева – родена в гр.Варна през 1978г. Завършва образованието си във факултета по ветеринарна медицина при Тракийски университет 
					гр.Стара Загора през 2003 г. От дипломирането си до постъпването във "Ветеринарен кабинет Санитус" е работила във ветеринарен кабинет 
					"Д-р Маринов" гр.Варна. 
					Интересите и са в областта на дерматология, стоматология, хирургия, терапия.
					</p>
				</div>
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