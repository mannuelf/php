<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Arrays</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>

<?php

    $numberList = ['Ronaldo', 'Shearer', 'Beckham', 'Quinn'];

    print_r($numberList);
    //echo $numberList[2] . "<br>";

    $names = [
        'first_name' => 'Manny',
        'last_name'  => 'Ferreira',
    ];

    print_r($names);
    echo $names['first_name'].' '.$names['last_name'];
?>
</body>
</html>
