<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8" >
	<title>Начало - Ветеринарен кабинет "САНИТУС" </title>
    <meta name="description" content="Ветеринарен кабинет Санитус – професионални грижи за здравето, профилактиката и лечението на вашите домашни любимци" />
    <meta name="keywords" content="Ветеринарен кабинет, Варна, владиславово, домашни любимци, ветеринарна клиника, лечение, прегледи, ветеринари, кастрация, зоомагазин, аптека, лекарства" /> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/index.css">
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
        <!-- slide show -->
  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<img class="img-responsive" src="images/slide-show/pets1.jpg" alt="slide1">
				</div>
				<div class="item">
					<img class="img-responsive" src="images/slide-show/pets2.jpg" alt="slide2">
				</div>
				<div class="item">
					<img  class="img-responsive" src="images/slide-show/pets4.png" alt="slide3">
				</div>
				<div class="item">
					<img class="img-responsive" src="images/slide-show/petss.jpg" alt="slide4">
				</div>
			</div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background: none !important" > <!-- buton lqvo -->
                <span class="glyphicon glyphicon-chevron-left" ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background: none !important" > <!-- buton dqsno -->
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
		</div><hr>
		<section class="row">
            <div class="col-lg-5">
                <h2>Какво предлагаме за вашите домашни любимци?</h2>
            </div>
            <div class="col-lg-7">
                <ul>
                    <li><i class="material-icons">check</i>Решаване на здравословни проблеми при кучета, котки, папагали и др. домашни животни</li>
                    <li><i class="material-icons">check</i>Грижи за тяхното здраве и профилактика </li>
                    <li><i class="material-icons">check</i>Готовност да помогнем по всяко време и в най-трудните ситуации</li>
                </ul>
            </div>
		</section><hr>
		<article>
            <h3>Защо във ветеринарен кабинет „Санитус“ сме различни?</h3>
            <p>Това, което ни обединява е доверието, уважението и отговорността. В съвременния свят на конкуренция и безразличие ние създадохме екип 
			от ветеринарни лекари с нова визия и ясна цел. Ние сме открити, некомерсиални и търсим иновации в работата си, 
            опирайки се на моралните и ветеринарно – медицински принципи.<br>
            Нашата мисия е да се грижим за здравето, профилактиката и качествения живот на домашния любимец, да бъдем толерантни 
            и да се отнасяме с уважение и деликатност към собствениците му.<br>
            Следим всички нови тенденции в развитието на ветеринарната медицина, поддържаме мрежа от консултанти във ветеринарната
            общност и се квалифицираме ежегодно.<br>
            Ветеринарен кабинет "Санитус" предлага професионални грижи за здравето, профилактиката и лечението на Вашите 
            домашни любимци в областите хиругия, акушеро-гинекология, онкология, дерматология, образна диагностика и лабораторни 
            изследвания. Доверете ни се напълно в грижата за тяхното обезпаразитяване и вакцинации. Можем да помогнем в леки и 
            трудни ситуации, свързани с оперативна намеса, бременност и раждане. В зоомагазина ще намерите богато разнообразие на качествени храни и аксесоари за Вашите любимци.
            </p>
		</article><hr>	
        <section class="row">
            <article class="col-lg-4 col-sm-4 col-xs-12">
                <h4>ЗА СПЕШНИ СЛУЧАИ !!!</h4><hr>
                <p>Ние бихме искали да Ви помогнем по всяко време. Можете да ни потърсите на посочените номера.</p>
            </article >
            <article  class="col-lg-4 col-sm-4 col-xs-12">
                <h4>РАБОТНО ВРЕМЕ</h4><hr>
                <ul>
					<li>Понеделник - Петък <span>9.00  - 19.30</span></li>
					
					<li>Събота  <span>10.00  - 19.00</span></li>
					
					<li>Неделя <span>10.00  - 16.00</span></li>
				</ul>
			</article >
            <article  class="col-lg-4 col-sm-4 col-xs-12">
                <h4>НАШИТЕ ВЕТЕРИНАРНИ ЛЕКАРИ</h4><hr>
                <p>Млад и амбициозен екип от лекари, получили образованието си при едни от най-добрите специалисти в областта на 
                ветеринарната медицина.</p>
        	</article >            
        </section>    
    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>