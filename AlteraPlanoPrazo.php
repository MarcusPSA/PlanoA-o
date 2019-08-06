<?php
include 'connection.php';
header("Content-Type: text/html; charset=ISO-8859-1",true);

date_default_timezone_set('America/Sao_Paulo');
$atual = new DateTime();
$atual=$atual->format('Y-m-d');
$atual_hist = new DateTime();
$atual_hist=$atual_hist->format('Y-m-d H:i:s');

$usuario_id=$_REQUEST['usuario_id'];
$cliente=$_REQUEST["hdnCliente"];
$cliente_id=$cliente;
$obrigacao=$_REQUEST["hdnObrigacao"];
$nivel=$_REQUEST['hdnNivel'];
$plano=$_REQUEST["hdnPlano"];
$evento_prazo='';
$evento_conlu='';
$acao=$_REQUEST["hdnAcao"];
$listar=$_REQUEST["listar"];




	$prazo=$_REQUEST["txtPrazo"];
	$prazo_antigo=$_REQUEST["hdnPrazoAntigo"];
	$prazo=date('Y-m-d', strtotime($prazo));
	
	

	if ($prazo_antigo!=$prazo){
	
		if ($prazo<$atual){
			echo"<script language='javascript' type='text/javascript'>alert('Ação invalida: O prazo não pode ser anterior à data de hoje');</script>";
		
		}
		
	else if ($prazo>=$atual){
		
	$prazo_hist=date('d/m/Y', strtotime($prazo));
	$prazo_antigo_hist=date('d/m/Y', strtotime($prazo_antigo));
	$evento_prazo=' Alterou o prazo da ação de '.$prazo_antigo_hist.' para '.$prazo_hist.'\n\n';
	
	
	$sqlupdate= " UPDATE plano set Prazo= '$prazo' WHERE Plano_id = $plano";
	$sqlinsert= "insert into historico_plano(Evento, Plano_id, Usuario_id, Data, Cliente_id) values ('$evento_prazo','$plano','$usuario_id','$atual_hist','$cliente')";
	
		
	
	mysql_query($sqlinsert) or die("<br> Erro");
	mysql_query($sqlupdate) or die("<br> Erro");
		}
		
		$sqldelete= " Delete from notifica Where Tipo_Notifica_id=$plano AND Tipo_Not='aend'";
		mysql_query($sqldelete) or die("<br> Erro");
		
		
	}

if($listar=="acao_obrigacao"){
include 'Acao.php';
}
else if($listar=="acao_todas"){
	include 'TodaAcao.php';
}





?>
