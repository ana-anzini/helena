<?php
date_default_timezone_set("America/Sao_Paulo");

include('Controller/functionPerfil.php');
include('Controller/functionMenu.php');

function formatCnpjCpf($value){
  $cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cpf) === 11) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf);
}

function converteIdMd5($tabela,$campoID,$idMd5){

	include('conexao.php');
	$sql = "SELECT ".$campoID." AS ID "
			." FROM ".$tabela
			." WHERE MD5(".$campoID.") = '".$idMd5."';";

	$result = mysqli_query($conn,$sql);    
	mysqli_close($conn);

	$id = 0;
	
	if (mysqli_num_rows($result) > 0) {
      $array = array();
      
      while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($array,$linha);
      }
      
      foreach ($array as $campo) {
        $id = $campo['ID'];
      }
	}
	return $id;
}

function proximoID($tabela,$campo){

	include('conexao.php');
	$sql = "SELECT MAX(".$campo.") AS ID "
          ." FROM ".$tabela.";";
  
	$result = mysqli_query($conn,$sql);    
	mysqli_close($conn);

	$id = 0;
	
	if (mysqli_num_rows($result) > 0) {
      $array = array();
      
      while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($array,$linha);
      }
      
      foreach ($array as $campo) {
        $id = $campo['ID'];
      }
	}
	return $id + 1;
}

?>