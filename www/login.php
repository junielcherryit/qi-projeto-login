<?php
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $connect = mysqli_connect('db','root','password', 'qi');
    if (isset($email)) {
        $verifica = mysqli_query($connect, "SELECT * FROM user WHERE email =
        '$email' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>alert('E-mail e/ou senha incorretos');window.location.href='login.html';</script>";
        } else{
            setcookie("email",$email);
            header("Location:index.php");
        }
    }
?>