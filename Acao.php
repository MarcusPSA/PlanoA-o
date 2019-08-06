<!DOCTYPE html>
<html lang="pt-br">

<?php

include 'Notifica_Plano.php';
   
date_default_timezone_set('America/Sao_Paulo');
$atual = new DateTime();
$atual=$atual->format('Y-m-d');
 
 
 
 
 $sqlselect ="SELECT plano.* , usuario.* FROM `plano` 
       		INNER JOIN `usuario` ON plano.`Usuario_id_Responsavel` = usuario.`Usuario_id` 
       		WHERE plano.Obrigacao_id = '$obrigacao' and plano.Cliente_id = '$cliente_id' order by Prazo";
 
 $result= mysql_query($sqlselect);
 
 $cont=0;
 $prog=0;
 $venc=0;
 $anda=0;
 
 
 $tipo_action='';
 
 while($vet=mysql_fetch_array($result)){
 	
 	$responsavel_id=$vet['Usuario_id_Responsavel'];
 	$autor=$vet['Autor'];
 	$plano=$vet['Plano_id'];
 	$numero=$vet['Numero_Acao'];
 	$responsavel=$vet['Nome_Usuario'];
 	$acao=$vet['Acao'];
 	$prazo=$vet['Prazo'];
 	$prazo_mostra=date('d/m/Y', strtotime($prazo));
 	$prazo=date('Y-m-d', strtotime($prazo));
 	$concluido=$vet['Concluido'];
 	
 	if($concluido==0 and $prazo>=$atual){
 	$tipo_action='anda';
 	$anda++;
 	}
 	if($concluido==0 and $prazo<$atual){
 	$tipo_action='venc';
 	$venc++;
 	}
 	if($concluido==1){
 	$tipo_action='prog';
 	$prog++;
 	}
 		
 	echo"<div class='action-$tipo_action'>";
 	echo"<div class='action-label-numero'>";
 	echo" Ação $numero";
 	echo"</div>";
 	echo"<div class='action-label-$tipo_action'>";
 	echo"<div class='action-texto-$tipo_action'>Autor :</div> $autor";
 	echo"</div>";
 	echo"<div class='action-label-$tipo_action'>";
	echo"<div class='action-texto-$tipo_action'>Responsável:</div> $responsavel";
	echo"</div>";
	echo"<div class='action-label-$tipo_action'>";
	echo"<div class='action-texto-$tipo_action'>Prazo :</div> $prazo_mostra";
	echo"</div>";
 	echo"<div class='action-label-content'>$acao</div>";
 	
 	echo"<div class='action-label-option'>";
 	echo"<div class='action-label-option-col-$tipo_action' data-toggle='modal' data-target='#ModalComentaAction$cont'>";
 	echo"Comentário";
 	echo"</div>";
 	echo"<div style='border-right: none;' class='action-label-option-col-$tipo_action' data-toggle='modal' data-target='#ModalHistAction$cont'>";
 	echo"Histórico";
 	echo"</div>";
 	echo"</div>";
 	
 	echo"<div class='action-label-editar' data-toggle='modal' data-target='#ModalEditAction$cont'>";
 	echo"Ver ação  <span class='glyphicon glyphicon-circle-arrow-right'>";
 	echo"</div>";
 	
 	
 	echo"</div>"; //fim da div action
 
 ///////////////////////////////////////////////////////////////////////////////////////////	
 	echo"<div id='ModalEditAction$cont' class='modal fade' role='dialog'>";
 	echo"<div class='modal-dialog'>";
 	echo"<div class='modal-content'>";
 	echo"<div class='$tipo_action modal-header'>";
 	echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
 	if ($tipo_action=='anda'){
 		echo"<h4 class='modal-title'>$numero: Ação em andamento</h4>";
 	}
 	if ($tipo_action=='venc'){
 		echo"<h4 class='modal-title'>$numero: Ação vencida</h4>";
 	}
 	if ($tipo_action=='prog'){
 		echo"<h4 class='modal-title'>$numero: Ação concluída</h4>";
 	}
 	echo"</div>";
 	echo"<div class='modal-body'>";
 	
 	echo"<div class='inter-action-label'>";
 	
 	echo"<div style='margin:0 3% 0 0;' class='$tipo_action inter-action-title'>Ação:</div>";
 	echo"$acao";
 	echo"</div>";
 	
 	echo "<form>";
 	
 	if($nivel>1){
 	echo"<div class='inter-action-label'>";	
 	echo"<div class='$tipo_action inter-action-title'>Data limite para a conclusão da ação:</div>";
 	echo "<div class='inter-action-label-col'>";
 	$prazo_antigo=$prazo;
 	echo"<input type='Date' class='form-control' id='prazo$cont'   name='txtPrazo$cont' value= '$prazo' min='$atual' >";
 	echo " <input type='hidden' value ='$prazo_antigo' name='hdnPrazoAntigo$cont'>";
 	echo " <input type='hidden' value ='$plano' name='hdnPlano$cont'>";
 	echo"</div>";
 	echo "<div class='inter-action-label-col'>";
 	echo "<button type='button' id='btnSalvaPrazo$cont' class='btnSalvaAlteracao btn btn-default btn-block' name='btnPrazo' data-dismiss='modal'>Salvar Prazo</button>";
 	echo"</div>";
 	echo"</div>";
 	}
 	
 	else if( $responsavel_id==$usuario_id ){
 		echo"<div class='inter-action-label'>";
 		echo"<div class='$tipo_action inter-action-title'>Data limite para a conclusão da ação:</div>";
 		echo "<div class='inter-action-label-col'>";
 		$prazo_antigo=$prazo;
 		echo"<input type='Date' class='form-control' id='prazo$cont'   name='txtPrazo$cont' value= '$prazo' disabled>";
 		echo " <input type='hidden' value ='$prazo_antigo' name='hdnPrazoAntigo$cont'>";
 		echo " <input type='hidden' value ='$plano' name='hdnPlano$cont'>";
 		echo"</div>";
 		echo "<div class='inter-action-label-col'>";
 		echo"</div>";
 		echo"</div>";
 	}
 	

 	else {
 		echo"<div class='inter-action-label'>";
 		echo"<div class='$tipo_action inter-action-title'>Data limite para a conclusão da ação:</div>";
 		echo "<div class='inter-action-label-col'>";
 		$prazo_antigo=$prazo;
 		echo"<input type='Date' class='form-control' id='prazo$cont'   name='txtPrazo$cont' value= '$prazo' disabled>";
 		echo " <input type='hidden' value ='$prazo_antigo' name='hdnPrazoAntigo$cont'>";
 		echo " <input type='hidden' value ='$plano' name='hdnPlano$cont'>";
 		echo"</div>";
 		echo "<div class='inter-action-label-col'>";
 		echo"</div>";
 		echo"</div>";
 	}
 	
 	
 	
 	echo " <input type='hidden' value ='$concluido' name='hdnConcluido$cont'>";
 	echo " <input type='hidden' value ='$acao' name='hdnAcao$cont'>";
 	echo " <input type='hidden' value ='$obrigacao' name='hdnObrigacao$cont'>";
 	echo " <input type='hidden' value ='$nivel' name='hdnNivel$cont'>";
 	echo " <input type='hidden' value ='$cliente_id' name='hdnCliente$cont'>";
 	
 	
 	if($nivel>1 || $responsavel_id==$usuario_id){
 	echo"<div style='border:none;' class='inter-action-label'>";
 	echo"<div class='$tipo_action inter-action-title'>Ação concluída?</div>";
 	echo "<div class='inter-action-label-col'>";
 	echo"<div class='inter-action-status'>";
 	echo" <input name='chckConcluido$cont' id='chckConcluido$cont'  type='radio' value='1'"; if ($concluido==1) {echo" checked >SIM";} else {echo">SIM";}
 	echo"  <input name='chckConcluido$cont' id='chckConcluido$cont'  type='radio' value='0'"; if ($concluido==0) {echo" checked >NÃO";} else {echo">NÃO";}
 	echo"</div>";
 	echo"</div>";
 	echo "<div class='inter-action-label-col'>";
 	echo "  <button type='button' id='btnSalvaConcluido$cont' class='btnSalvaAlteracao btn btn-default btn-block' name='btnConcluido' data-dismiss='modal'> Salvar Status da Ação</button>";
 	echo"</div>";
 	echo"</div>";
 	}
 	
 	else{
 		echo"<div style='border:none;' class='inter-action-label'>";
 		echo"<div class='$tipo_action inter-action-title'>Ação concluída?</div>";
 		echo "<div class='inter-action-label-col'>";
 		echo"<div class='inter-action-status' style='background: #EEEEEE;'>";
 		echo" <input name='chckConcluido$cont' id='chckConcluido$cont'  type='radio' value='1' disabled"; if ($concluido==1) {echo" checked >SIM";} else {echo">SIM";}
 		echo"  <input name='chckConcluido$cont' id='chckConcluido$cont'  type='radio' value='0' disabled"; if ($concluido==0) {echo" checked >NÃO";} else {echo">NÃO";}
 		echo"</div>";
 		echo"</div>";
 		
 		echo"</div>";
 	}
 	
 	
 	echo "</form>";
 	
 	echo"</div>";
 	echo"<div class='modal-footer'>";
 	if($nivel>1 ){
 	echo"<button type='button' class='btnExclui btn' data-toggle='modal' data-target='#ModalExcluiAcao$cont' data-dismiss='modal'  >Excluir Ação</button>";
 	}
 	
	echo"<button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
	</div>
	</div>
 	
	</div>
	</div>";// fim da div ModalEditAction
 	
 	
 	echo"<div id='ModalComentaAction$cont' class='modal fade' role='dialog'>";
 	echo"<div class='modal-dialog'>";
 	echo"<div class='modal-content'>";
 	echo"<div class='modal-header'>";
 	echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
 	echo"<h4 class='modal-title'>Adicionar Comentário à Ação $numero</h4>";
 	echo"</div>";
 	echo"<div class='modal-body'>";
 	
 	echo"<div class='CaixaTextoTelaInteira'>";
 	echo " <input type='hidden' value ='$plano' name='hdnPlano$cont'>";
 	echo " <input type='hidden' value ='$cliente_id' name='hdnCliente$cont'>";
 	echo"<textarea name='txtComentaPlano$cont'>  </textarea>";
 	echo"</div>";
 	
 	echo"</div>";
 	echo"<div class='modal-footer'>
 	<button type='button'  id='btnSalvaComentPlano$cont' class='btnSalvaComentPlano btn btn-info' data-toggle='modal' data-target='#ModalHistAction$cont' data-dismiss='modal'>Salvar Comentário</button>
 	<button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
 	</div>
 	</div>
 	
 	</div>
 	</div>";
 	
 	
 	
 	
 
 	
 	echo"<div id='ModalHistAction$cont' class='modal fade' role='dialog'>";
 	echo"<div class='modal-dialog'>";
 	echo"<div class='modal-content'>";
 	echo"<div class='modal-header'>";
 	echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
 	echo"<h4 class='modal-title'>Histórico da Ação</h4>";
 	echo"</div>";
 	echo"<div class='modal-body'>";
 	echo"<div class='historico'>";
 	echo"<div id='NovoEvent$cont'>";
 	mostraEvento($plano,$cliente_id);
 	echo"</div>";
 	echo"</div>";
 	echo"</div>";
 	echo"<div class='modal-footer'>
	<button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
	</div>
	</div>
 	
	</div>
	</div>";
 	
 	
 	echo"<div id='ModalExcluiAcao$cont' class='modal fade' role='dialog'>";
 	echo"<div class='modal-dialog'>";
 	echo"<div class='modal-content'>";
 	echo"<div class='modal-header'>";
 	echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
 	echo"<h4 class='modal-title'>Excluir ação</h4>";
 	echo"</div>";
 	echo"<div class='modal-body'>";
 	echo"Tem certeza que deseja excluir a ação?";
 	echo"</div>";
 	echo"<div class='modal-footer'>
 	<button type='button'id='btnExcluiPlano$cont' class='btnExcluiPlano btn btn-default' data-dismiss='modal'>Excluir</button>
 	<button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>
 	</div>
 	</div>
 	
 	</div>
 	</div>";
 	

 	$cont++;
 	
 	}
 	
 	
 	function mostraEvento($plano,$cliente)
 	{
 		$evento_total='';
 		$sqlselectHist ="SELECT historico_plano.*, usuario.* FROM `historico_plano`
 		INNER JOIN `usuario` ON historico_plano.`Usuario_id` = usuario.`Usuario_id`
 		WHERE historico_plano.Plano_id = '$plano' and historico_plano.Cliente_id = '$cliente'  ORDER BY Data DESC";
 		$resultHist= mysql_query($sqlselectHist);
 		while($vet=mysql_fetch_array($resultHist)){
 			$nome=$vet['Nome_Usuario'];
 			$evento=$vet['Evento'];
 			$data=$vet['Data'];
 			$data=date('d/m/Y H:i', strtotime($data));
 			$evento_total=$evento_total."<div class='data-hist'><b>".$data."</b></div><div class='corpo-hist'><b>".$nome.":</b> ".$evento."</div></br>";
 		}
 	
 	
 		echo"$evento_total";
 	}
 		
?>
<script type="text/javascript">

function progresso() { 
	
	 var cont = "<?php echo $cont; ?>";
 	 var prog = "<?php echo $prog; ?>";
 	 var venc = "<?php echo $venc; ?>";
 	 var anda = "<?php echo $anda; ?>";

 	 var result_prog = (prog)*100/(cont);
 	 var result_venc = (venc)*100/(cont);
 	 var result_anda = (anda)*100/(cont);
 	
 	 var total=parseFloat(result_prog.toFixed(1))+parseFloat(result_venc.toFixed(1))+parseFloat(result_anda.toFixed(1));
 	
 	 if(total>100){
 			if(result_venc>0){
 			result_venc=result_venc - 0.05;
 			}
 	 }

 	 total=parseFloat(result_prog.toFixed(1))+parseFloat(result_venc.toFixed(1))+parseFloat(result_anda.toFixed(1));	

 	 if(result_prog>0){
 	 if(total>100){
 			result_prog=result_prog - 0.05;
 			}
 	 }
 		
 	 var result_prog = result_prog.toFixed(1);
 	 var result_venc = result_venc.toFixed(1);
 	 var result_anda = result_anda.toFixed(1);
 	
 	 result_prog=result_prog+"%";
 	 result_venc=result_venc+"%";
 	 result_anda=result_anda+"%";
 	 
 	 $("#prog").css("width",result_prog);
 	 $("#venc").css("width",result_venc);
 	 $("#anda").css("width",result_anda);

 	 document.getElementById("prog").innerHTML = result_prog;
 	 document.getElementById("venc").innerHTML = result_venc;
 	 document.getElementById("anda").innerHTML = result_anda;
}

	
///////////////////////////////////////////////////////////////////////////////////////


 $(document).ready(function() {

	 $(".btnExcluiPlano").click(function() {

			var id_btn = $(this).attr('id');
			var n_id = id_btn.replace("btnExcluiPlano", "");
			var Obrigacao =  $("input[name=hdnObrigacao"+n_id+"]").val();		
			var usuario_id = "<?php echo $usuario_id; ?>";
			var Cliente =  $("input[name=hdnCliente"+n_id+"]").val();
			var Plano =  $("input[name=hdnPlano"+n_id+"]").val();
			var Nivel =  $("input[name=hdnNivel"+n_id+"]").val();
			var Listar='acao_obrigacao';
			
			//usar o metodo ajax da biblioteca jquery para postar os dados em AlteraChecklist.php
			$.ajax({
				"url":"ExcluiPlano.php",
				"dataType": "html",
				"data": {
					"usuario_id" :usuario_id,
					"listar" :Listar,
					hdnCliente:Cliente, 
					hdnPlano:Plano, 
					hdnObrigacao:Obrigacao,
					hdnNivel:Nivel,
					
					
				},
				"success": function(response) {
					
					//em caso de sucesso, a div ID=saida recebe o response do post
					setTimeout(function(){ $(".ListaAcao").html(response); progresso(); }, 500);
					
							}

			});
						
		});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $(".btnSalvaComentPlano").click(function() {

			var id_btn = $(this).attr('id');
			var n_id = id_btn.replace("btnSalvaComentPlano", "");

					
			var usuario_id = "<?php echo $usuario_id; ?>";
			var Comentario  = $("textarea[name=txtComentaPlano"+n_id+"]").val();
			var Cliente =  $("input[name=hdnCliente"+n_id+"]").val();
			var Plano =  $("input[name=hdnPlano"+n_id+"]").val();
			var Nivel =  $("input[name=hdnNivel"+n_id+"]").val();

			
			//usar o metodo ajax da biblioteca jquery para postar os dados em AlteraChecklist.php
			$.ajax({
				"url":"AlteraComentarioPlano.php",
				"dataType": "html",
				"data": {
					"usuario_id" :usuario_id,
					txtComentaPlano:Comentario,
					hdnCliente:Cliente, 
					hdnPlano:Plano, 
					hdnNivel:Nivel,
					
				},
				"success": function(response) {
					
					//em caso de sucesso, a div ID=saida recebe o response do post
					$("div#NovoEvent"+n_id).html(response);
					$("textarea[name=txtComentaPlano"+n_id+"]").val('');
							}

			});
						
		});
///////////////////////////////////////////////////////////////////////////////////////////////////

	 $(".btnSalvaAlteracao").click(function() {

		
		 
			var id_btn = $(this).attr('id');
            if(id_btn.charAt(8)=="P"){
			var n_id = id_btn.replace("btnSalvaPrazo", "");
            }
            if(id_btn.charAt(8)=="C"){
			var n_id = id_btn.replace("btnSalvaConcluido", "");
            }

            
            
			//capturar o valor dos campos do fomulario
			
			var usuario_id = "<?php echo $usuario_id; ?>";
			var Cliente =  $("input[name=hdnCliente"+n_id+"]").val();
			var Plano  = $("input[name=hdnPlano"+n_id+"]").val();
			var Nivel =  $("input[name=hdnNivel"+n_id+"]").val();
			var Obrigacao =  $("input[name=hdnObrigacao"+n_id+"]").val();
			var Acao =  $("input[name=hdnAcao"+n_id+"]").val();
			var Prazo =  $("input[name=txtPrazo"+n_id+"]").val();
			var PrazoAntigo =  $("input[name=hdnPrazoAntigo"+n_id+"]").val();
			var ConcluidoAntigo =  $("input[name=hdnConcluido"+n_id+"]").val();

			var  Concluido='';
			var Listar='acao_obrigacao';

			// pega um novo valor para cumpre se ele for mofificado
			
					
						
						 //Executa Loop entre todas as Radio buttons com o name de chckCumpre
					      $('input:radio[name=chckConcluido'+n_id+']').each(function() {
							//Verifica qual está selecionado
				            if ($(this).is(':checked'))
				            	Concluido = parseInt($(this).val());
				        	
				        })
				   
					   
 
			
			

				if(id_btn=="btnSalvaPrazo"+n_id){
	         var url="AlteraPlanoPrazo.php";
	         
				}
			else if(id_btn=="btnSalvaConcluido"+n_id){
		         var url="AlteraPlanoStatus.php";
					}
					      
			
			//usar o metodo ajax da biblioteca jquery para postar os dados em AlteraChecklist.php
			$.ajax({
				"url":url,
				"dataType": "html",
				"data": {
					"usuario_id" :usuario_id,
					"listar" :Listar,
					hdnCliente:Cliente, 
					hdnPlano:Plano,
					hdnObrigacao:Obrigacao,
					hdnAcao:Acao,
					txtPrazo:Prazo, 
					hdnPrazoAntigo:PrazoAntigo,
					"Concluido" :Concluido,
					hdnConcluido:ConcluidoAntigo,
					hdnNivel:Nivel,
					 			
				},
				"success": function(response) {
					//em caso de sucesso, a div ID=saida recebe o response do post
				
				 		 
				setTimeout(function(){ $(".ListaAcao").html(response); progresso(); }, 500);
						    
					
				}

			});
			
			
		});


	

	 }); // fim do $(document).ready(function()...      
 </script>
</html>