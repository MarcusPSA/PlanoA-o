<?php
include 'connection.php';
header("Content-Type: text/html; charset=ISO-8859-1",true);



$usuario_id=$_REQUEST['usuario_id'];
$nivel=$_REQUEST['hdnNivel'];
$cliente=$_REQUEST["hdnCliente"];
$origem_a=$_REQUEST["hdnOrigemA"];


$cliente_id=$cliente;
$sqlselect="SELECT MAX(Numero_Acao) FROM plano WHERE Cliente_id=$cliente";
$result= mysql_query($sqlselect);	
$teste_n = mysql_num_rows($result);

if($teste_n>0){
$vet=mysql_fetch_array($result);
$max=$vet['MAX(Numero_Acao)'];
$max++;
}
else{
	$max=1;
}

$obrigacao=$_REQUEST["hdnObrigacao"];
$prazo=$_REQUEST["DataPrazo"];
$usuario_responsavel=$_REQUEST["sltResponsavel"];
$usuario_autor=utf8_decode($_REQUEST["hdnAutor"]);
$acao=utf8_decode($_REQUEST["txtAcao"]);
$concluido='0';

$prazo_hist=date('d/m/Y', strtotime($prazo));

$acao = trim($acao);


date_default_timezone_set('America/Sao_Paulo');
$atual = new DateTime();
$data=$atual->format('Y-m-d H:i:s');
$datateste=$atual->format('Y-m-d');
$evento_data=date('d/m/Y', strtotime($data));


if ($prazo<$datateste){
	echo"<script language='javascript' type='text/javascript'>alert('Ação invalida: O prazo não pode ser anterior à data de hoje.');</script>";
}

else if ($prazo>=$datateste){
$sqlinsert= "insert into plano( Autor, Obrigacao_id, Cliente_id, Usuario_id_Responsavel, Prazo, Acao, Data, Concluido, Numero_Acao) values ('$usuario_autor','$obrigacao','$cliente','$usuario_responsavel','$prazo','$acao', '$data', '$concluido', '$max')";
mysql_query($sqlinsert) or die("<br> Erro");
$last_id= mysql_insert_id();

$sqlselect ="SELECT Nome_Usuario FROM `usuario`
WHERE usuario.Usuario_id = '$usuario_responsavel'";
$result= mysql_query($sqlselect);
$vet=mysql_fetch_array($result);
$nome_responsavel=$vet['Nome_Usuario'];


$evento='Ação adicionada.';


$sqlinsert_hist= "insert into historico_plano(Evento, Plano_id, Usuario_id, Data, Cliente_id) values ('$evento','$last_id','$usuario_id','$data', '$cliente')";
mysql_query($sqlinsert_hist) or die("<br> Erro ao cadastrar em histórico");


$titulo="Uma nova ação (número: ".$max."), de sua responsablidade, foi criada.";
$texto=$nome_responsavel.", uma nova ação (número ".$max."), de sua responsablidade, foi criada por ".$usuario_autor.".";


$sqlinsert= "insert into notifica(Tipo_Notifica_id, Usuario_id, Cliente_id, Data, Titulo, Texto, Ativo, Tipo_Not, Emissor_id) values ('$last_id','$usuario_responsavel','$cliente','$data','$titulo','$texto','0','anew','0')";
mysql_query($sqlinsert) or die("<br> Erro de notificação");
 
if($origem_a=="OrigemSolicit"){
	$tipo_notifica_id=$_REQUEST["hdnTipoNotifica_id"];
	$sqldelete= " Delete from notifica Where Tipo_Notifica_id=$tipo_notifica_id AND Tipo_Not='asolicit'";
	mysql_query($sqldelete) or die("<br> Erro");
}

}


include 'Acao.php';

?>
