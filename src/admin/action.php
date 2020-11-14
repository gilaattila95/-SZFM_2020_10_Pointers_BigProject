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
    unset($_SESSION["auid"]);
    unset($_SESSION["uname"]);
    header("location: admin.php");
}

if ($pEvent == "bejelentkezés") {
    $sql = "select * from admin_userek where uname = '$uname' and aktiv = 1";
    
    if($result = mysqli_query($dbc, $sql)) {
        
        $row = mysqli_fetch_row($result);
        if(password_verify($psw, $row[2])) {// Beléphet
            $_SESSION["auid"] = $row[0];
            $_SESSION["uname"] = $row[3];
            if(isset($_SESSION["auid"])) {
                header("location: administrator.php");
                exit;
            }
        } else { // Nem léphet be
            $uzenet = "Sikertelen belépés!";
        }  
    }

} else if ($gEvent == "kilepes") {
        unset($_SESSION["auid"]);
        unset($_SESSION["uname"]);
        header("location: admin.php");
    }

//ADMIN FELÜLETEN AZ ÖSSZES CIKK LISTÁZÁSA
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "administrator") {
    if (isset($_SESSION["auid"])) {
        $sql ="select * from cikkek where kategoria=vicces";
        $cikkek = mysqli_query($dbc, $sql);

        if(isset($_POST['submit'])){
            if(isset($_POST['articles'])) {
                $selected = $_POST['articles'];
                     
                    if($selected == "all") {
                        $sql ="select * from cikkek";
                        $cikkek = mysqli_query($dbc, $sql);
                    } else {
                        $sql ="select * from cikkek where kategoria='$selected'";
                        $cikkek = mysqli_query($dbc, $sql);
                    }
            }
        }
    } 
}


//HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
function truncate($str, $chars, $end = '...') {
    if (strlen($str) <= $chars) return $str;
    $new = substr($str, 0, $chars + 1);
    return substr($new, 0, strrpos($new, ' ')) . $end;
}

// ADMIN FELÜLETI CIKKFELTÖLTÉS
function phpAlert($msg) {
    echo  '<div align="center"> <div class="alert" style=" width: 450px; padding: 20px; background-color: #51A9F6; color: white; margin-bottom: 15px;">';
    echo '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'"';
    echo ' style="margin-left: 15px; color: white; font-weight: bold; float: right; font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;"';
    echo '>&times;</span>';
    echo $msg;
    echo '</div></div>'; 
}

if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "admin_send_article") {
    if (isset($_SESSION["auid"])) { 
        $auid = $_SESSION["auid"];
        if($pEvent == "cikkFel") { 
            $filename = $_FILES["kep"]["name"]; 
            $tempname = $_FILES["kep"]["tmp_name"];     
            $folder = "../images/".$filename; 
            $sql = "insert into cikkek (ctext, kep, asent, usent, aktiv, kategoria) values ('$ctext', '$filename', $auid, 0, 1, '$kategoria')";
            if (($_FILES["kep"]["type"] == "image/jpeg" || $_FILES["kep"]["type"] == "image/pjpeg") || $_FILES["kep"]["type"] == "image/png" || $_FILES["kep"]["type"] == "image/jpg" || $_FILES["kep"]["size"] == 0 && isset($ctext) ) {
                if(mysqli_query($dbc, $sql)) {
                    if (move_uploaded_file($tempname, $folder))  { 
                        $msg = "A képfeltöltés sikeres!"; 
                        phpAlert($msg);
                    
                    } else { 
                        $msg = "A képfeltöltés sikertelen!"; 
                        phpAlert($msg);
                    }
                    $msg = "A cikkfeltöltés sikeres!"; 
                    phpAlert($msg);
                } else {
                    $msg = "A cikkfeltöltés sikertelen!"; 
                    phpAlert($msg);
                }
            } else {
                $msg = "A képformátum nem megfelelő!"; 
                phpAlert($msg);
            }
        }
    } 
}

//ADMIN FELÜLETEN A MUNKATÁRSAK ÁLTAL BEKÜLDÖTT CIKKEK MEGJELENÍTÉSE
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "users_articles") {
    if (isset($_SESSION["auid"])) {
     $sql ="select * from cikkek where usent=1";
     $cikkek = mysqli_query($dbc, $sql);
     
     if(isset($_POST['submit'])){
        if(isset($_POST['articles'])) {
            $selected = $_POST['articles'];
                 
                if($selected == "all") {
                    $sql ="select * from cikkek where usent=1";
                    $cikkek = mysqli_query($dbc, $sql);
                } else {
                    $sql ="select * from cikkek where usent=1 and aktiv=$selected";
                    $cikkek = mysqli_query($dbc, $sql);
                }
            }
        }
    } 
 }

 //ADMIN FELÜLETEN EGY CIKK MEGNÉZÉSE
 if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "article") {
    if (isset($_SESSION["auid"])) {
        $cid = $_GET['cid'];
        $sql ="select * from cikkek where cid='$cid'";
        $cikk = mysqli_query($dbc, $sql);
    }
}

//FELHASZNALOK ALTAL BEKULDOTT CIKKEK AKTIVALASA VAGY TORLESE
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "article") {
    if (isset($_SESSION["auid"])) {
        if($pEvent == "aktivalas") {  
            $cid = $_GET['cid'];
            $sql = "update cikkek set aktiv = 1 where cid=$cid";
            
            if(mysqli_query($dbc, $sql)) {
                $_SESSION['msg'] ="A cikk aktiválva lett!";
                header("location: users_articles.php");
                exit;
            } else {
                $msg ="A cikk aktiválás sikertelen!";
                phpAlert($msg);
            }
        }
        
        if($pEvent == "torles") {  
            $cid = $_GET['cid'];
            $sql = "delete from cikkek where cid=$cid";

            if(mysqli_query($dbc, $sql)) {
                $_SESSION['msg'] ="A cikk törölve lett!";
                header("location: users_articles.php");
                exit;
                
            } else {
                $msg ="A cikk törlése sikertelen!";
                phpAlert($msg);
            }
        }   
    } 
}

?>