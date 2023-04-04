<?php

$zipCode= trim(filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_SPECIAL_CHARS));

$time = date('H:i:s');

// On encode en json pour rendre le tout compatible avec js
echo json_encode($time);

$url = curl_init('mette url api ici');

curl_exec($url);

curl_close($url);