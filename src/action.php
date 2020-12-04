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
    
    $sql = "select * from cikkek inner join likes_number on cikkek.cid=likes_number.cid where kategoria = 'erdekes' order by RAND() LIMIT 1 ";
    $erdekes = mysqli_query($dbc, $sql);
}

//Vicces Cikkek kilistázása random 
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "vicces") {
  
    $sql = "select * from cikkek inner join likes_number on cikkek.cid=likes_number.cid where kategoria = 'vicces' order by RAND() LIMIT 1 ";
    $erdekes = mysqli_query($dbc, $sql);
}

//Rangsor kilistázása like-ok alapján
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "rank") {
    $sql ="select * from cikkek inner join likes_number on cikkek.cid=likes_number.cid order by likes desc ";
    $cikkek = mysqli_query($dbc, $sql);
}

//HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
function truncate($str, $chars, $end = '...') {
    if (strlen($str) <= $chars) return $str;
    $new = substr($str, 0, $chars + 1);
    return substr($new, 0, strrpos($new, ' ')) . $end;
}
?>