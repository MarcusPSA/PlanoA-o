<?php
include 'connection.php';

header("Content-Type: text/html; charset=ISO-8859-1",true);


$usuario_id=$_REQUEST["usuario_id"];
$listar=$_REQUEST["listar"];
$cliente=$_REQUEST["hdnCliente"];
$cliente_id=$cliente;
$obrigacao=$_REQUEST["hdnObrigacao"];
$plano=$_REQUEST["hdnPlano"];
$nivel=$_REQUEST['hdnNivel'];



$sqldelete= " Delete from plano Where Plano_id=$plano";
mysql_query($sqldelete) or die("<br> Erro");

$sqldelete2= " Delete from notifica Where Tipo_Notifica_id=$plano AND (Tipo_Not='aend' or Tipo_Not='anew')";
mysql_query($sqldelete2) or die("<br> Erro");



if($listar=="acao_obrigacao"){
include 'Acao.php';
}
else if($listar=="acao_todas"){
	include 'TodaAcao.php';
}

?>
