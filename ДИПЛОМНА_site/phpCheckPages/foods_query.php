<?php
    include '../database.php';
?>

<script>
    $("button.btn-info").click(function() {
            $(this).next().toggle();
        });
      
</script>

<?php
    
    if(!isset($_POST['page'])){
        $page = 1;
    }
    else {
        $page = $_POST['page'];
    }

    $marka = $_POST['marka'];
    $vid = $_POST['vid'];
    $vkus= $_POST['vkus'];
    $jivotno= $_POST['jivotno'];
    $godini = $_POST['godini'];

    $where_clause = "";
    $unique_rows = "SELECT * FROM `servgoods_food`";
    if($marka != "" || $vid != "" || $vkus != "" || $jivotno != "" || $godini != "") {
        $where_clause .=" WHERE";

        if($marka != "") {
            $where_clause  .=" brand in($marka)";
        }

        if($vid != "") {
            if($marka != "")
                $where_clause .= " AND";
            
            $where_clause .= " food_type in($vid)";
        }
        if($vkus != "") {
            if($marka != "" || $vid != "")
                $where_clause .=" AND";
            
            $where_clause .=" taste in($vkus)";
        }
        if($jivotno != "") {
            if($marka != "" || $vid != "" || $vkus != "")
                $where_clause .= " AND";
            
            $where_clause .=" animal in($jivotno)";
        }
        if($godini != "") {
            if($marka != "" || $vid != "" || $vkus != "" || $jivotno != "")
                $where_clause .= " AND";

            $where_clause .=" animal_age in($godini)";
        }

    }
    $unique_rows .= $where_clause;
    $result = mysqli_query($link, $unique_rows) or die(mysqli_error($link));
    $food_blocks_count = mysqli_num_rows($result);

    //abs vs hrani (+tezi koito imat nqkolko versii)
    $sqlQuery = "SELECT * FROM `servgoods_food_varieties`";
    $result2 = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

    //masiv za cena i teglo na vsqka ot hranite
    $weight_price = array();
    while($row = mysqli_fetch_array($result2))
    {
        array_push($weight_price, $row['food_weight'], $row['food_price']);
    }

    $results_per_page = 4;
    
    if($food_blocks_count <= $results_per_page) {
        $number_of_pages = 0;
    }
    else {
        $number_of_pages = ceil($food_blocks_count / $results_per_page);
    }


     //startovo chislo ot koi red na hranite da zapochvame 
     $start_limit_number = ($page - 1) * $results_per_page;

     $sqlQuery2 = "SELECT *, `food_price`, `food_weight`, COUNT(`id_food`) as `broi` FROM `servgoods_food` JOIN `servgoods_food_varieties` ON `servgoods_food`.`id` = `servgoods_food_varieties`.`id_food`";

     $sqlQuery2 .= $where_clause;
     $sqlQuery2 .= " GROUP BY(`id_food`) LIMIT ".$start_limit_number . ', ' . $results_per_page;

     $final_result = mysqli_query($link, $sqlQuery2) or die(mysqli_error($link));

    if($final_result) {

        if(mysqli_num_rows($final_result) > 0 ) {
            while($rezultat = mysqli_fetch_array($final_result)) {
            
                echo "<div class='item'>
                <div class='images'>
                    <img src='images/Goods/Foods/$rezultat[img_name]' />
                </div>
                <div class='info'>
                    <h4>$rezultat[food_name]</h4>
                    <button type='button' class='btn btn-info'>Информация</button>
                    <p>$rezultat[info]</p>
                    <div class='price'>
                        <ul>
                            <h5>Характеристики:</h5>
                            <li>$rezultat[food_type]</li>
                            <li>$rezultat[taste]</li>
                            <li>За $rezultat[animal]</li>
                            <li>$rezultat[animal_age] </li>
                        </ul>
                        <ul> <h5>Цена:</h5>";
                        if($rezultat['broi'] > 1) {
                            $index = $rezultat['id']*2 - 2;
                            for($a = 1; $a<=$rezultat['broi']; $a++) {
                                
                                echo "<li>".kgs($weight_price[$index])." кг. - ". $weight_price[$index+1] . "лв. </li>";
                                $index+=2;
                            }
                        }
                        else {
                            echo "<li>".kgs($rezultat['food_weight'])." кг.   -   $rezultat[food_price] лв. </li>";
                        }
                    echo "</ul>
                  </div>
                </div>
                </div>";   
            }
        }
        else {
            echo "<h1 style='text-align: center'>Няма намерени резултати.</h1>";
        }
       
    }

    $activePg = "activePage";
    echo "<div class='pageLinks'>";
    for($i = 1; $i <= $number_of_pages; $i++)
    {
        if($page == $i) {
            $activePg = "activePage";
        }
        else{
            $activePg = "";
        }
        echo "<a href='javascript:void(0)' class='$activePg'>$i</a>";
    }
    echo "</div>";

?>