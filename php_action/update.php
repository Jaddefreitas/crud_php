<?php

//conexao
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])): 
    $nome       = mysqli_escape_string($connect, $_POST['nome']);
    $email      = mysqli_escape_string($connect, $_POST['email']);
    $telefone   = mysqli_escape_string($connect, $_POST['telefone']);
    $cidade     = mysqli_escape_string($connect, $_POST['cidade']);
    $uf         = mysqli_escape_string($connect, $_POST['uf']);
    $id         = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE clientes SET nome = '$nome', email = '$email', telefone = '$telefone', cidade = '$cidade', uf = '$uf' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] =  "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_session['mensagem'] = "Erro ao atualizar";
        echo "Erro: ".mysqli_error($connect) . " <br> SQL: ".$sql;
        //header('Location: ../index.php?erro');
    endif;
else: 
    echo "Não foi dessa vez";
endif;