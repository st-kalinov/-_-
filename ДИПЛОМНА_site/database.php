<?php
$sql_host=$_SERVER['HTTP_HOST'];
$sql_user='root';
$sql_pass='';
$sql_database='sanitus';

$link = mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_database) or die();
mysqli_set_charset($link, 'utf8');

function health_good($theGood) {
    global $link;
    $sqlQuery = "Select * from `servhealth_subtype` where name = '$theGood'";
    $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

    $rezultat = mysqli_fetch_array($result);
    echo "<header class='col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1'>
        <h2>$rezultat[servHealthType_name] - $rezultat[name]</h2>
        </header>";
    echo "<section class='col-sm-12'>";
        echo "<figure class='col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10'><img src='images/health_goods/$rezultat[img_name]' /></figure>";
        echo "<article class='col-sm-offset-1 col-sm-6 col-xs-offset-1 col-xs-10'><p>$rezultat[info]</p></article>";
    echo "</section>";

}

//function for catagories checkboxes
function que($theQuery, $category, $column)
{
    global $link;
    $result = mysqli_query($link, $theQuery) or die(mysqli_error($link));
    $counter = 1;
    
    while($each = mysqli_fetch_array($result)){
    echo "<input type='checkbox' name='$category' value='".$each[$column]."'  id='$category+$counter' /> 
    <label for='$category+$counter'> $each[$column]</label><br>";
    $counter++;
    }
}

//function for zero after decimal point on goods KGs
function kgs($kilos) {
    $kg = floatval($kilos);
    return $kg;
}

//function for clean data on Registration and Login
function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//function to hash passowords on registration
function passHash($pass) {
    $passsymbol = "a4szsgjjm3*21";
    $pass = md5($pass);
    $pass.=$passsymbol;
    $pass = sha1($pass);

    return $pass;
}
?>