<?php

    session_start();


    //trabalhando na montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    //implode('#', $_POST);
    //PHP.EOL é para quebra de linha
    $texto = $_SESSION['id'] . '#' . $_POST['titulo'] . '#' . $_POST['categoria'] . '#' . $_POST['descricao'] . PHP_EOL;
    
    $arquivo = fopen('arquivo.hd', 'a');

    //escrevendo o texto
    fwrite($arquivo, $texto);

    //fechando o arquivo
    fclose($arquivo);

    //echo $texto;
    header('Location: abrir_chamado.php');
?>