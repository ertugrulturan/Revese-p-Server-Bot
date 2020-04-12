<div class="col-md-10"><div class="content-box-header">
		  					<div class="panel-title">Reverse IP Sorgulama</div></div>
<div class="content-box-large box-with-header">
<form action="" method="post">
<input class="form-control" placeholder="site.com" type="text" name="wsite">
<br>
<center>
<input class="btn btn-primary" type="submit" name="reverse">
</center>
</form>
<br>
<?php
$_POST["site"];
$_POST["reverse"];

if(empty($_POST["site"])) {
exit;
}


error_reporting(E_ALL);
$ch = curl_init("https://viewdns.info/reverseip/?host=".$_POST["site"]."&t=1");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
$whois = curl_exec($ch);

preg_match_all('@<table border="1">(.*?)</table>@si',$whois,$tiert13r);
echo '<h4>Target : '.htmlspecialchars($_POST["wsite"]).'</h4>';
echo '<table class="table"><thead><tbody>'.$tiert13r[1][0].'</table></tbody>';
curl_close($ch);
}
?>
