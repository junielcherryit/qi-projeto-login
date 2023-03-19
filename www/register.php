<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = MD5($_POST['senha']);
    $connect = mysqli_connect('db','root','password','qi');
    if($nome == "" || $nome == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo Nome deve ser preenchido');window.location.href='register.html';</script>";
    } else {
        if($email == "" || $email == null){
            echo"<script language='javascript' type='text/javascript'>alert('O campo E-mail deve ser preenchido');window.location.href='register.html';</script>";
        } else {
            if($senha == "" || $senha == null){
                echo"<script language='javascript' type='text/javascript'>alert('O campo Senha deve ser preenchido');window.location.href='register.html';</script>";
            } else {
                $verifica = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'") or die("erro ao selecionar");
                if (mysqli_num_rows($verifica)>0) {        
                    echo"<script language='javascript' type='text/javascript'>alert('Esse e-mail já existe');window.location.href='register.html';</script>";
                } else {
                    $query = "INSERT INTO user (nome, email, senha) VALUES ('$nome','$email','$senha')";
                    $insert = mysqli_query($connect, $query);
                    if($insert){
                        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
                    } else {
                        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='register.html'</script>";
                    }
                }
            }
        }        
    }
?>
