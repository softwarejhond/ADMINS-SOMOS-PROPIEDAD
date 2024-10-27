<?php
$url = '190.8.176.35';
$user = 'hablemos';
$password= '4Ee8-63@Ha';
$nameDB = 'hablemos_inventarioinmobiliaria';
$db = mysqli_connect($url, $user, $password, $nameDB);

if (!$db){
    echo "Hubo un erro";
    exit;
};

