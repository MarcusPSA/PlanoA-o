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
$plano=$_REQUEST["hdnPlano"];
$evento_prazo='';
$evento_conlu='';
$acao=$_REQUEST["hdnAcao"];
$nivel=$_REQUEST['hdnNivel'];
$listar=$_REQUEST["listar"];

	
	$concluido_antigo=$_REQUEST["hdnConcluido"];
	$concluido=$_REQUEST['Concluido'];
	
	
	if ($concluido_antigo!=$concluido){
		
		$sqlupdate= " UPDATE plano set Concluido= '$concluido' WHERE Plano_id = $plano";
		mysql_query($sqlupdate) or die("<br> Erro");
	
		if($concluido==1){
			$evento_conclu=' Alterou status da ação para concluída.\n\n';
			$sqlinsert= "insert into historico_plano(Evento, Plano_id, Usuario_id, Data, Cliente_id) values ('$evento_conclu','$plano','$usuario_id','$atual_hist','$cliente')";
			
			mysql_query($sqlinsert) or die("<br> Erro");
				
		}
	
		else if($concluido==0){
			$evento_conclu=' Alterou status da ação para não concluída.\n\n';
			$sqlinsert= "insert into historico_plano(Evento, Plano_id, Usuario_id, Data, Cliente_id) values ('$evento_conclu','$plano','$usuario_id','$atual_hist','$cliente')";
			
			mysql_query($sqlinsert) or die("<br> Erro");	
								
		}
		$sqldelete= " Delete from notifica Where Tipo_Notifica_id=$plano AND Tipo_Not='aend'";
		mysql_query($sqldelete) or die("<br> Erro");
		
	}
	
	else{
		echo"<script language='javascript' type='text/javascript'>alert('O status da ação não foi modidificado!');</script>";
		
	}
	if($listar=="acao_obrigacao"){
		include 'Acao.php';
			}
	else if($listar=="acao_todas"){
		include 'TodaAcao.php';
	}
?>
