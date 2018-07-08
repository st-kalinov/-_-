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
	<title>Зоомагазин храни - Ветеринарен кабинет "САНИТУС"</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/all_css.css">
    <link rel="stylesheet" href="cssFiles/templatesCss.css">
    <link rel="stylesheet" href="cssFiles/mainCss/foodd.css">
	<link rel="stylesheet" href="cssFiles/bootstrap_override.css">
	<link rel="stylesheet" href="cssFiles/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <script>
  
    $(document).ready(function() {
        var selectedPage;
        var checkboxNames;
        var data_for_send;
        var keysArray;
        
        function OrderBy() {
            checkboxNames = ["marki", "vid_hrani", "vkus", "jivotno", "godini"];
            data_for_send = {brand: "", food_type: "", animal_age: "", taste: "", animal: ""};
            keysArray = [];

            for(let prop in data_for_send) {
                if(data_for_send.hasOwnProperty(prop)) {
                    keysArray.push(prop);      
                }
            }
            for(let i = 0; i < 5; i++) {
                $("input[name="+checkboxNames[i]+"]").each(function() {
                    if($(this).prop('checked') == true) {
                        data_for_send[keysArray[i]] += "'";
                        data_for_send[keysArray[i]] += $(this).val();
                        data_for_send[keysArray[i]] += "'";
                        data_for_send[keysArray[i]] += ",";
                    }
                });
            }

            for(let i = 0; i < 5; i++ ) {
                data_for_send[keysArray[i]] = data_for_send[keysArray[i]].substring(0, data_for_send[keysArray[i]].length - 1);
            }

            
        };
       

        function showResults() {
            OrderBy();
            $("#results").load("phpCheckPages/foods_query.php", 
            {'marka': data_for_send[keysArray[0]], 'vid': data_for_send[keysArray[1]], 'vkus': data_for_send[keysArray[2]], 'jivotno': data_for_send[keysArray[3]], 'godini': data_for_send[keysArray[4]]}, 
            function() {
                showResultsPerPage();
            }
        
            );
        };

       function showResultsPerPage() {
            $("div.pageLinks a").on("click", function() {
                        $("#results").load("phpCheckPages/foods_query.php", 
                        {'marka': data_for_send[keysArray[0]], 'vid': data_for_send[keysArray[1]], 'vkus': data_for_send[keysArray[2]], 'jivotno': data_for_send[keysArray[3]], 'godini': data_for_send[keysArray[4]], 'page': $(this).text()},
                        function() {
                            showResultsPerPage();
                        }
                    );
                });
         };
        


        showResults();

        
        $('input[name="marki"], input[name="vid_hrani"], input[name="vkus"], input[name="jivotno"], input[name="godini"]').on('click', function() {
            showResults();
        });
        
        
        $('button[type="reset"]').on('click', function() {
            $("input[type='checkbox']").each(function(){
                if($(this).prop('checked') == true)
                    $(this).prop('checked', false);
                    showResults();
            });  
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
    <main class="row">
        <aside class="col-sm-offset-0 col-sm-3 col-xs-offset-1 col-xs-10">
            <h5>Производители:</h5>
            <?php
                que("Select DISTINCT brand from servgoods_food", "marki", "brand");
            ?>
            <h5>Вид храни:</h5>
            <?php
                que("Select DISTINCT food_type from servgoods_food", "vid_hrani", "food_type");
            ?>
            <h5>Вкус:</h5>
            <?php
                que("Select DISTINCT taste from servgoods_food", "vkus", "taste");
            ?>
            <h5>Животно:</h5>
            <?php
                que("Select DISTINCT animal from servgoods_food", "jivotno", "animal");
            ?>
            <h5>Години на животното:</h5>
            <?php
                que("Select DISTINCT animal_age from servgoods_food", "godini", "animal_age");
            ?>
            <button type="reset" style="width: 100%" class="btn btn-info" value="Reset">Изчисти филтри</button>
        </aside>
        <section id="results" class="col-sm-offse-0 col-sm-9 col-xs-12">
          

        </section>


    </main>        
    <!-- FOOTER -->
	<?php
	    require('templates/footer.html');
	?>
</div>
</body>	
</html>