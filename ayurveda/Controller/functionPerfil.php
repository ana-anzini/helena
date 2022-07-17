<?php
//Carrega o perfil do usuario
function carregaPerfil($idUsuario){
    include('conexao.php');

    $sql = "SELECT * "
            ." FROM tb_Usuario "
            ." WHERE idUsuario = ".$idUsuario.";";

	$result = mysqli_query($conn,$sql);
	mysqli_close($conn);
	
	if (mysqli_num_rows($result) > 0) {
		$lista = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($lista,$linha);
		}
		
		foreach ($lista as $campo) {
            $_SESSION['idUsuario']     = $campo['idUsuario'];
            $_SESSION['NomeUsuario']   = $campo['Nome'];
            $_SESSION['FotoUsuario']   = $campo['Foto'];
            $_SESSION['LoginUsuario']  = $campo['Login'];
            $_SESSION['SenhaUsuario']  = $campo['Senha'];
        }	
			
	}
}
?>