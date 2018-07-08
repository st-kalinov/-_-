<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8" >
	<title>Галерия - Ветеринарен кабинет "САНИТУС" </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">    
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/gallery.css">
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
			<h1>Галерия</h1>
		</header>
        <div class="col-sm-8 col-sm-offset-2" id="pics">
            <ul class="list-inline">
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="0"><img class="img-thumbnail" src="images/Gallery/operacionna.jpg"></a></li>
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="1"><img class="img-thumbnail" src="images/Gallery/operacionna2.jpg"></a></li>
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="2"><img class="img-thumbnail" src="images/Gallery/operacionna3.jpg"></a></li>
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="3"><img class="img-thumbnail" src="images/Gallery/operaciq.jpg"></a></li>
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="4"><img class="img-thumbnail" src="images/Gallery/rabota.jpg"></a></li>
                <li data-toggle="modal" data-target="#myModal"><a href="#galeriq" data-slide-to="5"><img class="img-thumbnail" src="images/Gallery/rabota2.jpg"></a></li>
            </ul>
        </div>
	
		<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<div id="galeriq" class="carousel slide" data-interval="false">
							<div class="carousel-inner">
								<div class="item active"> 
									<img src="images/Gallery/operacionna.jpg" alt="item0">
								</div>
                                <div class="item"> 
									<img src="images/Gallery/operacionna2.jpg" alt="item1">
								</div>
								<div class="item"> 
									<img src="images/Gallery/operacionna3.jpg" alt="item2">
								</div>
								<div class="item"> 
									<img src="images/Gallery/operaciq.jpg" alt="item3">
								</div>
								<div class="item"> 
									<img src="images/Gallery/rabota.jpg" alt="item4">
								</div>
								<div class="item"> 
									<img src="images/Gallery/rabota2.jpg" alt="item5">
								</div>
							</div>
							<a class="left carousel-control" href="#galeriq" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a> 
							<a class="right carousel-control" href="#galeriq" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn-sm close" type="button" data-dismiss="modal">Затвори</button>
					</div>
				</div> 
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