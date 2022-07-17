<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('function.php');

$login = $_POST['nLogin'];
$senha = stripcslashes($_POST['nSenha']);

$_SESSION['login']     = $login;
$_SESSION['senha']     = $senha;
$_SESSION['msg-login'] = '';

include('conexao.php');
$sql = "CALL sto_ValidaUsuario('$login');";

$result = mysqli_query($conn,$sql);
mysqli_close($conn);

if (mysqli_num_rows($result) > 0) {
    $lista = array();
    
    while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($lista,$linha);
    }
    
    foreach ($lista as $campo) {
        if($campo['idUsuario'] > 0){
            $sql = "CALL sto_ValidaAcesso('$login','$senha');";
            
            include('conexao.php');
            $result2 = mysqli_query($conn,$sql);
            mysqli_close($conn);
    
            if (mysqli_num_rows($result2) > 0) {
                $lista = array();
                    
                while ($linha = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                    array_push($lista,$linha);
                }
                
                foreach ($lista as $campo2) {
                    $_SESSION['idUsuario'] = $campo2['idUsuario'];
                    $_SESSION['logado']    = 1;
                    $_SESSION['msg-login'] = '';
                    unset($_SESSION['SenhaUsuario']);

                    header('location:../pacientes.php');
                }
            }else{
                $_SESSION['msg-login'] = "Dados inválidos.";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }
}else{
    $_SESSION['msg-login'] = "Não encontramos esse login... Tente novamente.";
    header('location:'.$_SERVER['HTTP_REFERER']);
}

?>