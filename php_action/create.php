<?php

//conexao
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])): 
    $nome       = mysqli_escape_string($connect, $_POST['nome']);
    $email      = mysqli_escape_string($connect, $_POST['email']);
    $telefone   = mysqli_escape_string($connect, $_POST['telefone']);
    $cidade     = mysqli_escape_string($connect, $_POST['cidade']);
    $uf         = mysqli_escape_string($connect, $_POST['uf']);

    $sql = "INSERT INTO clientes (nome, email, telefone, cidade, uf) VALUE ('$nome','$email','$telefone','$cidade','$uf')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] =  "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_session['mensagem'] = "Erro ao cadastrar";
        //echo "Erro: ".mysqli_error($connect);
        header('Location: ../index.php?erro');
    endif;
else: 
    echo "Não foi dessa vez";
endif;