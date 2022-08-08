<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://parallelum.com.br/fipe/api/v1/carros/marcas');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);

echo $data;
curl_close($ch);

?>
