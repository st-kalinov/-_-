<?php
    include '../database.php';
    //izbranata data 
    $data = $_POST['data'];
    //promenliva za da napravim izbranoto kato tip Date
    $day = date_create($data);
 
//promenliva da napravim $day kato duma, t.e koi den e s dumi
    $dayWord = date_format($day, "l");
    

    //proverka koi den e i taka da opredelin nachalnoto rabotno vreme i kraq
    if($dayWord == 'Sunday') {
        $worktime = "10:00 - 16:00";
        $start_time = "10:00";
        $end_time = "16:00";
    }
    else if($dayWord == 'Saturday') {
        $worktime = "10:00 - 19:00";
        $start_time = "10:00";
        $end_time = "19:00";
    }
    else {
        $worktime = "9:00 - 19:30";
        $start_time = "9:00";
        $end_time = "19:30";
    }

    //zaqvka za tablicata za vsichki zapisani chasove (online, ot mqsto, ot telefon)
    $sqlQuery = "SELECT * from `signs` where `date` = '$data'";
    $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

    //zaqvka za tablicata za chasovete zapisani online
    $sqlQuery2 = "SELECT * from `online_signs` where `date` = '$data'";
    $result2 = mysqli_query($link, $sqlQuery2) or die(mysqli_error($link));

    
//ako ima nqkakvi zapisani chasove dali ot vsichki ili samo ot tezi online
    if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0) {
        //masivi za nachaloto na chasovete, za kraq na chasovete, za chasotove online i tezi neshta gi sybirame nai nakraq s posledniq masiv za vsichki zaeti chasove, koito nqma da se pokazvat
        //v dropdown-a
        $zaeti_chasove_start = array();
        $zaeti_chasove_end = array();
        $zaeti_chasove_online = array();
        $zaeti_chasove = array();

        //slagame nachaloto i kraq na vseki chas v negoviq masiv
        while($rezultat = mysqli_fetch_array($result)) {
            array_push($zaeti_chasove_start, $rezultat['hour_start']);
            array_push($zaeti_chasove_end, $rezultat['hour_end']);
        }
        
      //chasovote koito sa online, napravo gi slagame v posledniq masiv
        while($rezultat2 = mysqli_fetch_array($result2)) {
            $zaet = date('H:i:s', strtotime($rezultat2['hour']));
            array_push($zaeti_chasove, $zaet);
        }
       
        //v posledniq masiv slagame i drugite chasove kato pochvame ot tqhnoto nachalo do tehniq krai, kato uvelichavame s 30min
        //primer nachalo: 10:00:00 , krai: 11:00:00  --- v masiva shte slojim stoinosti  10:00:00, 10:30:00
        for($i = 0; $i < count($zaeti_chasove_start); $i++) {
            $zaeto = date('H:i:s', strtotime($zaeti_chasove_start[$i])); 
            while($zaeto != $zaeti_chasove_end[$i]) {
                array_push($zaeti_chasove, $zaeto);
                $zaeto = date('H:i:s', strtotime($zaeto)+1800);
            }
        }
       
        //promenliva za svobodnite chasove, kato q zadavame da e ravna na nachaloto na chasa za rabotniq den i taka shte uvelichavame do kraq na rabotniq den
        $svobodno = date('H:i:s', strtotime($start_time));
        $have_free_hours = false;
        echo "<label class='control-label' for='time'>Избор на час: <span class='req'>*</span></label>";
        echo "<select class='form-control' id='time' name='free_hours'>";
        while($svobodno != date('H:i:s', strtotime($end_time)))
        {
            //ako chasa go nqma v masiva za zaeti chasove go slagame v dropdown lista
            if(!in_array($svobodno, $zaeti_chasove)) {
                echo "<option value='$svobodno'>$svobodno</option>";
                $have_free_hours = true;
            }
            $svobodno = date('H:i:s', strtotime($svobodno)+1800);
        }
        echo "</select>";
        if(!$have_free_hours) {
            echo "<h2>Няма свободни часове на избраната от Вас дата.</h2>";
        }
        
    }
    else {
        $svobodno = date('H:i:s', strtotime($start_time));
        echo "<label class='control-label' for='time'>Избор на час:</label>";
        echo "<select class='form-control' id='time' name='free_hours'>";
        while($svobodno != date('H:i:s', strtotime($end_time)))
        {
            echo "<option value='$svobodno'>$svobodno</option>";
            $svobodno = date('H:i:s', strtotime($svobodno)+1800);
        }
        echo "</select>";
    }

   
?>