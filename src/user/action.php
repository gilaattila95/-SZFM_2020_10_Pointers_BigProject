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

$uzenet = "";

// Eseménykezelés
$pEvent = htmlspecialchars(filter_input(INPUT_POST, "event"));
$gEvent = htmlspecialchars(filter_input(INPUT_GET, "event"));
$uname = htmlspecialchars(filter_input(INPUT_POST, "uname"));
$psw = htmlspecialchars(filter_input(INPUT_POST, "psw"));
$ctext = htmlspecialchars(filter_input(INPUT_POST, "ctext"));
$kategoria = filter_input(INPUT_POST, "kategoria");


if ($gEvent == "kilepes") {
    unset($_SESSION["cuid"]);
    unset($_SESSION["uname"]);
    header("location:index.php");
}

if ($pEvent == "bejelentkezés") {
    $sql = "select * from ceg_userek where uname = '$uname' and aktiv = 1";
    
    if($result = mysqli_query($dbc, $sql)) {
        
        $row = mysqli_fetch_row($result);
        if(password_verify($psw, $row[2])) {// Beléphet
            $_SESSION["cuid"] = $row[0];
            $_SESSION["uname"] = $row[3];
            if(isset($_SESSION["cuid"])) {
                header("location:../src/user/user_article.php");
                exit;
            }
        } else { // Nem léphet be
            $uzenet = "Sikertelen belépés!";
        }  
    }

} else if ($gEvent == "kilepes") {
        unset($_SESSION["cuid"]);
        unset($_SESSION["uname"]);
        header("location:index.php");
    }


//User saját cikkeinek listázása
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "user_article") {
    if (isset($_SESSION["cuid"])) {
        $sql="select * from cikkek where aktiv=1 and usent=(select cuid from ceg_userek where uname = '$uname' and aktiv = 1)"; 
        $cikkek = mysqli_query($dbc, $sql);
    } 
}

$uzenet = "";


//HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
function truncate($str, $chars, $end = '...') {
    if (strlen($str) <= $chars) return $str;
    $new = substr($str, 0, $chars + 1);
    return substr($new, 0, strrpos($new, ' ')) . $end;
}

?>

