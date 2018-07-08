<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8" >
    <title>Въпроси - Ветеринарен кабинет "САНИТУС" </title>   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">    
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/faq.css">
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
        <header class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
			<h1>Често задавани въпроси</h1>
		</header>
		<div class="col-sm-4">
			<img class="img-circle" src="images/vaprosi.jpg" alt="vapros" />
		</div>
        <div class="col-sm-8">      
			<a href="#demo" data-toggle="collapse">
             На каква възраст се поставят първите ваксини при кучето и котката? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo" class="collapse">
                <h4>ОТГОВОР:</h4>
				<p>Едно от най–важните неща при подрастващите животни е изборът на адекватна ваксинална схема.Най – ранната възраст за поставяне на ваксина 
				при кучето е 40–42 дни след раждането. Първата имунизация може и да се забави с една седмица, в зависимост от имунния статус на майката.
				При котките началните ваксини се поставят най–рано два месеца след раждането.
				</p>
			</div>
			<a href="#demo1" data-toggle="collapse">
            Колко на брой са ваксините при кучето и котката и за какво се поставят? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo1" class="collapse">
                <h4>ОТГОВОР:</h4>					
				<p>При кучето началните ваксини могат да бъдат три или две на брой, а при котките те са две. Препоръчително е ежегодно да се прави реваксинация.
				След имунизация кучето изгражда имунитет срещу шест заболявания, две от които са опасни и за хората–бяс и лептоспироза.
				Котките се ваксинират срещу различен брой заболявания в зависимост от използваната ваксина.
				Най–често използваните ваксини са срещу три или четири вирусни заболявания, от които само бесът е опасен за хората.
				</p>
			</div>
			<a href="#demo2" data-toggle="collapse">
            Колко често трябва да се прави вътрешно обезпаразитяване при кучето и котката? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo2" class="collapse">
                <h4>ОТГОВОР:</h4>
				<p>Вътрешното обезпаразитяване е препоръчително да се прави винаги около седмица преди ваксинация.
				Извън този случай, обезпаразитяване се извършва веднъж на три месеца, като третирането се прави два пъти през две седмици. 
				Тъй като понякога при котките е трудно даването на таблетки за обезпаразитяване, на пазара има продукти, 
				които се прилагат чрез накапване по кожата.
				</p>
			</div>
			<a href="#demo3" data-toggle="collapse">
            Колко често трябва се поставя препарат против бълхи и кърлежи? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo3" class="collapse">
                <h4>ОТГОВОР:</h4>
                <p>Всички препарати, които се накапват по кожата на животните имат срок на действие един месец.
				Това означава, че ако стопаните искат любимецът им да е свободен от външни паразити трябва през активния сезон на 
				бълхите и кърлежите да го обезпаразитяват всеки месец. През по–хладните и зимните месеци напрежението на ектопаразити 
				намалява. Те почти изчеват от околната среда, но остават по животните.
				</p>				
			</div>	
			<a href="#demo4" data-toggle="collapse">
             Колко често трябва да се храни домашният любимец? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo4" class="collapse">
                <h4>ОТГОВОР:</h4>
				<p>Честотата на храненията зависи от възрастта, породата и в най–голяма степен от стопаните.
                При малките и подрастващи животни е добре дневната порция храна да се разделя на 3–4 хранения. С наближаването на една  
				годинка храненията трябва да се намалят до 1 или 2 на ден. Обикновено едрите породи кучета се хранят веднъж, а по–малките два пъти в деня.
				При котките най–често срещано е хранене от типа ad libitum или казано по друг начин винаги да имат храна в купичката. Това в
				повечето случаи е нормално, освен ако животното няма някакви по–специални нужди (наднормено тегло, кастрация и др.)							 
				</p>					
			</div>
			<a href="#demo5" data-toggle="collapse">
            Трябва ли женските животни да родят поне веднъж в живота си? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo5" class="collapse">
                <h4>ОТГОВОР:</h4>
				<p>Не! Кучето и котката са сезонно полициклични животни, което означава, че се разгонват повече от веднъж годишно.
				Организмът им е устроен така, че почти всяко разгонване да бъде последвано от бременност и раждане! Това е нормално за  
				тези видове животни. След удомашняването на кучето и котката този цикъл разгонване – бременност се нарушава. Остават 
				само разгонванията. Това оказва неблагоприятно влияние върху органите на половата система, млечните жлези и хормоналния 
				баланс. За това ние от ветеринарен кабинет Вита Нова препоръчваме всички женски животни, които няма да се използват за разплод, да бъдат 
				кастрирани във възможно най–ранна възраст.							 
				</p>					
			</div>
			<a href="#demo6" data-toggle="collapse">
            Нужно ли е да се поставя микрочип на животното? <i class="fas fa-angle-down"></i>
            </a>
			<div id="demo6" class="collapse">
				<h4>ОТГОВОР: </h4>		
				<p>Законодателството в България задължава всички собственици на домашни кучета да поставят микрочипове, а нас 
				ветеринарните лекари да въвеждаме всеки поставен микрочип в единна информационна система.  
				Това не важи за домашните котки. Микрочип се поставя и на всички животни които ще напускат страната. 
		 		</p>				
			</div>					
		</div>        
    </div>
    </main>
	<?php
	    require('templates/footer.html');
	?>      
</div>
</body>
</html>