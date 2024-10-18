<?php
$curl = curl_init();
$token = "mfi1gyoODwh2EUGZOhWUD2MglPAmMdx1Of0gDPyS05XVutj1ZRpchdzw01xeGfnc";
$phone = "085319027867";
$message = urlencode("test get");

curl_setopt($curl, CURLOPT_URL, "https://solo.wablas.com/api/send-message?phone=$phone&message=$message&token=$token");
$result = curl_exec($curl);
curl_close($curl);

?>