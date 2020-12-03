<?php
 session_start();
 
 // Adatbázis csatlakozás
$dbc = mysqli_connect("localhost", "root", "", "bigproject");
$sql = "set names utf8";
mysqli_query($dbc, $sql);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Érdekes Cikkek kilistázása random 
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "index") {
   
    if ($result = mysqli_query($dbc, "SELECT * FROM cikkek WHERE kategoria ='erdekes' and aktiv = 1")) {
        $row_cnt = mysqli_num_rows($result);
        mysqli_free_result($result);
    }

    $sql = "select * from cikkek where kategoria = 'erdekes' and aktiv = 1 order by RAND() LIMIT $row_cnt";
    $erdekes = mysqli_query($dbc, $sql);
}

//Vicces Cikkek kilistázása random 
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "vicces") {
  
    if ($result = mysqli_query($dbc, "SELECT * FROM cikkek WHERE kategoria ='vicces' and aktiv = 1")) {
        $row_cnt = mysqli_num_rows($result);
        mysqli_free_result($result);
    }

    $sql = "select * from cikkek where kategoria = 'vicces' and aktiv = 1 order by RAND() LIMIT $row_cnt";
    $erdekes = mysqli_query($dbc, $sql);
}

//HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
function truncate($str, $chars, $end = '...') {
    if (strlen($str) <= $chars) return $str;
    $new = substr($str, 0, $chars + 1);
    return substr($new, 0, strrpos($new, ' ')) . $end;
}
?>