<?php
include('configs.php');


$criar_usuario = str_replace('#', '-', $_POST['criar_usuario']);
$criar_senha = str_replace('#', '-', $_POST['criar_senha']);
$criar_perfil = str_replace('#', '-', $_POST['criar_perfil']);


$path2 = fopen('user.hd', 'r');

$pegaDados = fgets($path2);

if($pegaDados[0]){

    $addId = $pegaDados[0] + 1;
    

    $path = fopen('user.hd', 'a+');

    $inserir =  $addId . '#' . $criar_usuario . '#' . $criar_senha . '#' . $criar_perfil . PHP_EOL;
    
    if($addId == $addId){
        $addId = $addId + 1;
    }

    fwrite($path, $inserir);

    }

fclose($path2);


fclose($path);


?>