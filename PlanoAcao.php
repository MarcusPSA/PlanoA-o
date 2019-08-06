<?php header("Content-type: text/html; charset=iso-8859-1");?>
<html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
       <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>  
           <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"> </script>
 
     
       <title>Enterprise Consultoria</title>
   
    <style>
   html,
   body{
   background-color: #F5F8FA;
   margin:0; 
   height: 100%;
   }
   
   #header {
    position: fixed;
    z-index: 10;
    left: 0px;
    top: 0px;
	height: 65px;
	width: 100%;
	background-color: #FFF;
	border-bottom: 1px solid #E1E8ED;
	box-shadow: 0 7px 7px -7px #808080;

	}
   
   #header img {
    position: relative;  
  	left: 35px;
    top:10px;
	
	}
	
	.side-bar{	
	position: fixed;
	z-index: 10;
	top:80px;
	margin: 0px 2% 0 2%;
	padding: 0px 0 10px 0;
	height: auto;	
	width: 15%;  
	background: #ffffff;
    border-radius: 10px;
	border-width: 1px;
	border-color: #E1E8ED;
	border-style:  solid;
	float:left;
	box-shadow: 0px 7px 7px -7px #808080;
		
	}  
	
	.side-bar a {
    width: 100%;
    padding: 5% 10% 5% 10%;
    text-decoration: none;
    font-size: 12px;
    color: #5F5F5F;
    display: block;
}

.side-bar a:hover, .offcanvas a:focus{
    color: #fff;
     background: #747C81;
     cursor: pointer;
}

.side-bar-header {
     width: 100%;
     margin: none;
    padding: 5% 10% 5% 10%;
    font-size: 14px;
    color:  #fff;
    display: block;
    background: linear-gradient(to bottom right,  #31B0D5, #337AB7, #225);
    border: 0px solid #E1E8ED;
    border-radius: 11px 11px 0 0 ;
    text-align: center;
    
}

.side-bar-header-dados {
     width: 100%;
     margin: none;
    padding: 5% 10% 5% 10%;
    font-size: 12px;
    color:  #5F5F5F;
    display: block;
    border-bottom: 1px solid #E1E8ED;
    text-align: center;
    
}

.side-bar a:hover, .offcanvas a:focus{
    color: #fff;
     background: #747C81;
}
	
   
    #main-content{
	position: absolute;
	top:80px;
	left:17%;
	padding: 0px 15px 15px 15px;
	height: auto;
	width: 79%;
	margin: 0 2% 2% 2%;	  
	background: #ffffff; 
	border-radius: 10px; 
	border-width: 1px;
	border-color: #E1E8ED;
	border-style:  solid;
	box-shadow: 0px 7px 7px -7px #808080;
    overflow: auto;
	
	}
	
	
   
    #title-main{
    padding-bottom: 10px;
	position:relative;
	height: auto;
	color:  #747C81;
    border-bottom: 3px solid #0190B9;
    text-align: left;
    text-shadow: 1px 1px 1px #808080; 
    margin: 0 0 10px 0;
   	}  
   	
   	 #title-main  small{
  font-size: 18px;
   text-shadow: none;
  }
  
   .title-content{
    position:relative;
    height: auto;
   	color:  #0190B9;
    text-align: center;
    
   	}  
   	
   	.filtro {
    padding: 20px 0px 10px 0px;
    float: left;
    width: 50%; 
    height: auto;
    text-align: left;
    display: none;
    }
   	
   .filtros-col1-action{
   margin: 0px 2% 0px 0px;
   float:left;
   width: 50%;
   	}  
   .filtros-col2-action{
   margin: 0px 0px 0px 2%;
   float:left;
   width: 46%;
   	}  
   	
   	#filtro-tema{
   	position:relative; 
    left:50%;
   	}  
   	
   	.action-bar{
   	display: table;
   	position: relative;
   	width: 100%;
   	height: ;
   	margin: 0 0 10px 0;
    border-bottom: 2px solid #E1E8ED;
    padding: 0px 0px 10px 0px;
   	} 
   	
   	.action-bar-btn{
   	display: table;
   	float: left;
   	width: 13%;
   	padding: 0 1% 0 0;
   	margin:0 1% 0 0;
    border-right: 2px solid #E1E8ED;
   	} 
   	
   	.action-bar-legenda{
   	display: table;
   	float: left;
   	width: 11%;
   	margin: 0 1% 0 0;
   
   	} 
   	
   	.action-bar-legenda-label-prog{
    background: #337AB7;
   	text-align:center;
    font-size: 75%;
   	color: #FFF;
   	width: 100%;
   	} 
   	
   	.action-bar-legenda-label-anda{
    background: #5CB85C;
   	text-align:center;
   	font-size: 75%;
   	color: #FFF;
   	width: 100%;
   	} 
   	
   	.action-bar-legenda-label-venc{
    background: #D9534f;
   	text-align:center;
    font-size: 75%;
   	color: #FFF;
   	width: 100%;
   	} 
   	
    .action-bar-progress{
   	display: table;
   	float: right;
   	width: 60%;
   	} 
   	
   	
   	
   	.action-anda{
   	display: block;
    padding:none;
    margin:0 1% 2% 1%;
    border-right: 3px solid #5CB85C;
    border-left: 3px solid #5CB85C;
   	border-radius:5px;
   	width: 23%;
   	background: #5CB85C;
   	float: left;
   	}
   	
   	.action-texto-anda{
   	display: table;
   	color:#5CB85C;
   	background: #F5F5F5;
   	width: 50%;
   	float: left;
   	text-align:center;
   	}
   	
   	.action-label-anda{
   	background: #FFF;
   	text-align:center;
   	color: #5CB85C;
   	width: 100%;
   	margin: 0px 0px 3px 0px;
   	}
   	
   	.action-venc{
   	display: block;
    padding:none;
    margin:0 1% 2% 1%;
    border-right: 3px solid #D9534f;
    border-left: 3px solid #D9534f;
   	border-radius:5px;
   	width: 23%;
   	background: #D9534F;
   	float: left;
   	}
   	.action-texto-venc{
   	display: table;
   	color:#D9534F;
   	background: #F5F5F5;
   	width: 50%;
   	float: left;
   	text-align:center;
   	}
   	
   	.action-label-venc{
   	background: #FFF;
   	text-align:center;
   	color: #D9534F;
   	width: 100%;
   	margin: 0px 0px 3px 0px;
   	}
   	
   	
   	.action-prog{
   	display: block;
    padding:none;
    margin:0 1% 2% 1%;
   	border-right: 3px solid #337AB7;
   	border-left: 3px solid #337AB7;
   	border-radius:5px;
   	width: 23%;
   	background: #337AB7;
   	float: left;
   	}
   	
   	.action-texto-prog{
   	display: table;
   	color:#337AB7;
   	background: #F5F5F5;
   	width: 50%;
   	float: left;
   	text-align:center;
   	}
   	
   	.action-label-prog{
   	background: #FFF;
   	text-align:center;
   	color: #337AB7;
   	width: 100%;
   	margin: 0px 0px 3px 0px;
   	}
   	
    .action-label-numero{
   	text-align:left;
   	color: #FFF;
   	font-size: 15px;
   	width: 100%;
   	margin: 5px 0px 5px 0px;
   	padding-left: 2px;
   	}
   	
   	
   	.action-label-content{
   	background: #FFF;
   	height:27px;
   	width: 100%;
   	margin: 0px 0px 3px 0px;
   	color: #5F5F5F;
   	overflow:hidden;
   	text-align:justify;
   	padding:5px;
   	}
   	
   	.action-label-option{
   	background: #FFF; 
   	width: 100%;
   	margin: 0px 0px 3px 0px;
   	text-align:center;
   	}
   	
   	.action-label-option-col-anda{
   	background: #FFF;
   	float:left;
   	width:50%;
   	text-align:center;
   	font-size:11px;
   	color: #5CB85C;
   	padding: 5px 0 5px 0;
   	border-right: 2px solid #5CB85C;
   	}
   	
   	.action-label-option-col-anda:hover{
    color: #fff;
    background: #747C81;
    cursor:pointer;
}

	.action-label-option-col-prog{
   	background: #FFF;
   	float:left;
   	width:50%;
   	text-align:center;
   	font-size:11px;
   	color: #337AB7;
   	padding: 5px 0 5px 0;
   	border-right: 2px solid #337AB7;
   	}
   	
   	.action-label-option-col-prog:hover{
    color: #fff;
    background: #747C81;
    cursor:pointer;
}

	.action-label-option-col-venc{
   	background: #FFF;
   	float:left;
   	width:50%;
   	text-align:center;
   	font-size:11px;
   	color: #D9534F;
   	padding: 5px 0 5px 0;
   	border-right: 2px solid #D9534F;
   	}
   	
   	.action-label-option-col-venc:hover{
    color: #fff;
    background: #747C81;
    cursor:pointer;
}
   	
   	 .action-label-editar{
   	text-align:center;
   	color: #FFF;
   	font-size: 15px;
   	width: 100%;
   	padding: 30px 20% 0 20%;
   	margin: 5px 0px 5px 0px;
   	cursor:pointer;
   	}
   	
   	.action-label-editar:hover{
    color: #EEEEFF;
    text-decoration: underline;
	}

	#ModalAddAcao textarea{
  	width: 100%;
  	 height: 100px;
  	 border-radius: 5px;
	}
	
	#ModalAddASolicit textarea{
  	width: 100%;
  	 height: 100px;
  	 border-radius: 5px;
	}
	
	#ModalSolicitAcao textarea{
  	width: 100%;
  	height: 100px;
  	border-radius: 5px;
	}
	
	
	.modal-header{
     background:#31B0D5;
     color:#FFF;
    }
    
    .anda{
     background:#5CB85C;
     color:#FFF;
    }
    
     .venc{
     background:#D9534F;
     color:#FFF;
    }
    
     .prog{
     background:#337AB7;
     color:#FFF;
    }
    
    .inter-action-label{
   	max-height: 200px;   
   	overflow:auto; 
   	text-align:justify;
   	border-bottom: 2px solid #E1E8ED;
   	padding: 10px 0px 10px 0px;
   	}
   	
   	.inter-action-label-col{
   	display: table;
   	width: 33%;
   	float: left;
   	margin: 0 0 0 3%;
   	}
   	
   	.inter-action-label-col-btn{
   	display: table;
   	width: 32%;
   	float: left;
   	margin: 0 0 0 2%;
   	}
   	   	
   	.inter-action-title{
   	float:left;
   	width: 28%;
   	text-align:center;
   	font-size:15px;
   	font-weight: bold;
   	padding: 0px 5px 0px 5px;
   	border: 2px solid hidden;
   	border-radius:5px;
   	}
    
     .modal-footer button.btn-info{
    float:left;
    }
    
    .modal-footer button.btnExclui{
    float:left;
    }
    
    .inter-action-status{
   	height:34px;
   	padding: 5px;
   	text-align: center;
   	border: 1px solid #CCCCCC;
   	border-radius:5px;
   	}
   	
   	.CaixaTextoTelaInteira textarea{
   width: 100%;
   height: 100px;
   border-radius: 5px;
    } 
    
    .AddArquivo{
   margin: 0 0 10px 0;
    } 
    
    .historico{
    max-height: 320px;
    width: auto;
    overflow:auto;
    }  
    
    .data-hist{
    display:table;
    border-radius: 10px;  
    padding: 2px 5px 2px 5px;
    float:left;
    color:#FFF;
    background: #747C81;
    margin: 0 0 0 3px;
    }              
   
   .corpo-hist{
    display:table;
    padding: 2px 5px 2px 5px;
    }  
    
    .justifica-obrig{
   	text-align:justify;
   	}
   
   </style>
   
   
   </head>
       <body >
      
       
       <?php		
		include 'connection.php';
		include 'DadosUsuario.php';
		?>
	<div id="title-main"> <h3>Plano de Ação </h3>
</div>
	
	<div class="action-bar">
	
	<?php
	if($nivel>1){
	echo"<div class='action-bar-btn'>";
	echo"<input type='button'  class='btn btn-info btn-sm btn-block' data-toggle='modal' data-target='#ModalAddAcao' name='btnSubimit' value='Adicionar Ação'>";
	echo"</div>";
	}
	
	else{
	echo"<div class='action-bar-btn'>";
	echo"<input type='button'  class='btn btn-info btn-sm btn-block' data-toggle='modal' data-target='#ModalSolicitAcao' name='btnSubimit' value='Solicitar Ação'>";
	echo"</div>";
	}
	?>
	
	<div class="action-bar-btn">
	<input type="button"  class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#ModalInfoAcao" name="btnSubimit" value="Ver Obrigação">
	</div>
	
	<div class="action-bar-legenda">
	<div class="action-bar-legenda-label-prog">Concluídas</div>
	<div class="action-bar-legenda-label-anda">Em andamento</div>
	<div class="action-bar-legenda-label-venc">Vencidas</div>
	</div>
	
	<div class="action-bar-progress">
	 
	 <div class="progress-lg" >
    <div  id="prog" class="progress-bar progress-bar-striped" role="progressbar" >
    </div>
    <div id="anda" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" >  
    </div>
    <div id="venc" class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" > 
    </div>
  </div>
	
	</div>
	
	</div>
	
	
	<?php
	
	
	$origem = $_REQUEST['origem'];
	
	if($origem=="asolicitnoti"){
		$tipo_notifica_id = $_REQUEST['tipo_notifica_id'];
	
		$sqlselect ="SELECT obrigacao.Obrigacao_id , obrigacao.Verificacao, solicitacao_acao.* FROM `obrigacao`
		INNER JOIN `solicitacao_acao` ON obrigacao.`Obrigacao_id` = solicitacao_acao.`Obrigacao_id`
		INNER JOIN `notifica` ON solicitacao_acao.`solicitacao_acao_id` = notifica.`Tipo_Notifica_id`
		WHERE notifica.`Tipo_Notifica_id` = '$tipo_notifica_id' AND notifica.`Usuario_id`= '$usuario_id' ";
		$result= mysql_query($sqlselect);
		$vet= mysql_fetch_array($result);
		$obrigacao=$vet['Obrigacao_id'];
		$verificacao=$vet['Verificacao'];
		$acao_solicit=$vet['Acao'];
		$usuario_solicita=$vet['Usuario_id'];
	}
	
	if($origem=="noti"){
		$tipo_notifica_id = $_REQUEST['tipo_notifica_id'];
		
		$sqlselect ="SELECT obrigacao.Obrigacao_id , obrigacao.Verificacao FROM `obrigacao`
		INNER JOIN `plano` ON obrigacao.`Obrigacao_id` = plano.`Obrigacao_id`
		INNER JOIN `notifica` ON plano.`Plano_id` = notifica.`Tipo_Notifica_id`
		WHERE notifica.`Tipo_Notifica_id` = '$tipo_notifica_id'";
		$result= mysql_query($sqlselect);
		$vet= mysql_fetch_array($result);
		$obrigacao=$vet['Obrigacao_id'];
		$verificacao=$vet['Verificacao'];	
	}
	
	if($origem=="Ob_Tema" or $origem=="Ob_Lei"){
		$obrigacao = $_REQUEST['hdnObrigacao'];
		$checklistLei = $_REQUEST['hdnChecklistLei'];
		$verificacao = utf8_decode($_REQUEST['hdnVerificacao']);
	}
////////////////////////////////////////////////////////////////////////////////////////

		echo"<div id='ModalAddAcao' class='modal fade' role='dialog'>";
		echo"<div class='modal-dialog'>";
		echo"<div class='modal-content'>";
		echo"<div class='modal-header'>";
		echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
		echo"<h4 class='modal-title'>Adicionar Ação</h4>";
		echo"</div>";
		echo"<div class='modal-body'>";
		
		    echo "          <form>";
		    
		   echo"<div class='filtros-col1-action'>";
		    echo"<div class='form-group'>";
		    echo"<label>Responsável:</label>";
		    
		echo"<select class='form-control' required name='sltResponsavel'>";
		
		
		$sqlquery="select usuario.* from usuario where Cliente_id=$cliente_id order by Nome_Usuario";
$result= mysql_query($sqlquery);
		
       echo "<option value=''> Selecione </option>";
		while($vet= mysql_fetch_array($result)){
                $usuario_id_responsavel=$vet['Usuario_id'];
                $nome_responsavel=$vet['Nome_Usuario'];
			echo "<option value='$usuario_id_responsavel'>$nome_responsavel</option>";

           }
?>
</select>	
	
 </div> <!--fim da div form-group -->
 </div> <!--fim da div filtros-col	 -->
  	
  	<div class="filtros-col2-action">
      <div class="form-group">
	 	  
	 	 <label>Data limite para conlusão da ação:</label>
	 	 <?php
	 	 date_default_timezone_set('America/Sao_Paulo');
	 	 $atual = new DateTime();
	 	 $atual=$atual->format('Y-m-d');
	 	 
	 	 echo"<input   type='Date' class='form-control' required='required' id='prazo' name='DataPrazo' min='$atual'>";
	 	 ?>
	</div> <!--fim da div form-group -->
 </div> <!--fim da div filtros-col	 -->  	

		
		   <label>Ação:</label>
		<textarea  name="txtAcao">  </textarea></br>
		
       	   
       	   
       	   <?php	
       	   echo " <input type='hidden' value ='$nome_usuario' name='hdnAutor'>";
       	   echo " <input type='hidden' value ='$cliente_id' name='hdnCliente'>";
       	   echo " <input type='hidden' value ='$obrigacao' name='hdnObrigacao'>";
       	   echo " <input type='hidden' value ='$nivel' name='hdnNivel'>";
       	  
       	      
       	     
       	    
       	       	      

echo"</div>";
echo"<div class='modal-footer'>
	<button type='button' class='btnSalvaAcao btn btn-info' name ='btnSalvaAcao' data-dismiss='modal'>Adicionar Ação </button>
    <button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
	</div>";
   echo "  </form>
	</div>
       
	</div>
	</div>";// fim da modal AddAcao
   
////////////////////////////////////////////////////////////////////////////////////////
   
   echo"<div id='ModalAddASolicit' class='modal fade' role='dialog'>";
   echo"<div class='modal-dialog'>";
   echo"<div class='modal-content'>";
   echo"<div class='modal-header'>";
   echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
   echo"<h4 class='modal-title'>Adicionar Ação</h4>";
   echo"</div>";
   echo"<div class='modal-body'>";
   
   echo "          <form>";
   
   echo"<div class='filtros-col1-action'>";
   echo"<div class='form-group'>";
   echo"<label>Responsável:</label>";
   
   echo"<select class='form-control' required name='sltResponsavelSolicit'>";
   
   
   $sqlquery="select usuario.* from usuario where Cliente_id=$cliente_id order by Nome_Usuario";
   $result= mysql_query($sqlquery);
   
   echo "<option value=''> Selecione </option>";
   while($vet= mysql_fetch_array($result)){
   	$usuario_id_responsavel=$vet['Usuario_id'];
   	$nome_responsavel=$vet['Nome_Usuario'];
   	echo "<option value='$usuario_id_responsavel'"; if($usuario_id_responsavel==$usuario_solicita){echo"selected";}echo">$nome_responsavel</option>";
   
   }
   ?>
   </select>	
   	
    </div> <!--fim da div form-group -->
    </div> <!--fim da div filtros-col	 -->
     	
     	<div class="filtros-col2-action">
         <div class="form-group">
   	 	 <label>Data limite para conlusão da ação:</label>
   	 	 <?php
	 	 date_default_timezone_set('America/Sao_Paulo');
	 	 $atual = new DateTime();
	 	 $atual=$atual->format('Y-m-d');
	 	 
   	 	echo" <input   type='Date' class='form-control' required='required' id='prazoSolicit' name='DataPrazoSolicit' min='$atual'>";
   	 	 ?>
   	</div> <!--fim da div form-group -->
    </div> <!--fim da div filtros-col	 -->  	
   
   		<?php
   		  echo" <label>Ação:</label>";
   		echo"<textarea  name='txtAcaoSolicit'>$acao_solicit</textarea></br>";
   		
          	   
          	   
          	   	
          	   echo " <input type='hidden' value ='$nome_usuario' name='hdnAutor'>";
          	   echo " <input type='hidden' value ='$cliente_id' name='hdnCliente'>";
          	   echo " <input type='hidden' value ='$obrigacao' name='hdnObrigacao'>";
          	   echo " <input type='hidden' value ='$nivel' name='hdnNivel'>";
               echo " <input type='hidden' value ='$tipo_notifica_id' name='hdnTipoNotifica_id_solicit'>";
          	   
          	      
          	     
          	    
          	       	      
   
   echo"</div>";
   echo"<div class='modal-footer'>
   	<button type='button' class='btnSalvaAcaoSolicit btn btn-info' name ='btnSalvaAcaoSolicit' data-dismiss='modal'>Adicionar Ação Solicitada </button>
       <button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
   	</div>";
      echo "  </form>
   	</div>
          
   	</div>
   	</div>";// fim da modal AddASolicit


/////////////////////////////////////////////////////////////////////////////////////////////////////////// 
  
   
   echo"<div id='ModalSolicitAcao' class='modal fade' role='dialog'>";
   echo"<div class='modal-dialog'>";
   echo"<div class='modal-content'>";
   echo"<div class='modal-header'>";
   echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
   echo"<h4 class='modal-title'>Solicitar Ação</h4>";
   echo"</div>";
   echo"<div class='modal-body'>";
   
   echo "          <form>";
  
   ?>
   		
   		   <label>Ação:</label>
   		<textarea  name="txtSolocitAcao">  </textarea></br>
   		
          	   
          	   
   <?php	    	       	      
   echo " <input type='hidden' value ='$obrigacao' name='hdnObrigacao'>";
   
   echo"</div>";
   echo"<div class='modal-footer'>
   	<button type='button' class='btnSolicitaAcao btn btn-info' name ='btnSolicitaAcao' data-dismiss='modal'>Solicitar Ação </button>
       <button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
   	</div>";
      echo "  </form>
   	</div>
          
   	</div>
   	</div>";// fim da modal SolicitAcao
   
   
///////////////////////////////////////////////////////////////////////////////////////////////////////////  
      
      echo"<div class='ListaAcao' >";
   
      include 'Acao.php';
      echo"</div>";
    

	
 	
 
 /////////////////////////////////////////////////////////////////////////////////////	
 	
 	
 	echo"<div id='ModalInfoAcao' class='modal fade' role='dialog'>";
 	echo"<div class='modal-dialog'>";
 	echo"<div class='modal-content'>";
 	echo"<div class='modal-header'>";
 	echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
 	echo"<h4 class='modal-title'>Obrigação</h4>";
 	echo"</div>";
 	echo"<div class='modal-body'>";
 	echo"<div class='justifica-obrig'>";
 	echo"$verificacao";
 	echo"</div>";
 	echo"</div>";
 	echo"<div class='modal-footer'>
	<button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
	</div>
	</div>
    
	</div>
	</div>";// fim da modal InfoAcao
 	
 	
 	
 	
 	

 ?>
 

 <div id="ModalConfirmaSolicitacao" class="modal fade" role="dialog">
 	<div class='modal-dialog'>
 	<div class='modal-content'>
 	<div class='modal-header'>
 	<button type='button' class='close' data-dismiss='modal'>&times;</button>
 	<h4 class='modal-title'>Confirmação de Solicitacao</h4>
 	</div>
 	<div class='modal-body'>
 	
 	<div class='ConfirmaSolicitacao'>
 	
 	</div>
 	
 	</div>
 	<div class='modal-footer'>
 	
 	<button type='button' class='btn btn-default'' data-dismiss='modal'>Fechar</button>
 	</div>
 	</div>
 	</div>
 	</div>
 
 
 <script type="text/javascript">

 
//////////////////////////////////////////////////////////////////////////////////////
 
 function salva_acao_solicit() { 
 	
	 var login;
     login = "<?php echo $login; ?>";
     usuario_id = "<?php echo $usuario_id; ?>";
		var Responsavel =  $("select[name=sltResponsavelSolicit]").val();
		var Prazo  = $("input[name=DataPrazoSolicit]").val();
		var Autor  = $("input[name=hdnAutor]").val();
		var Cliente  = $("input[name=hdnCliente]").val();
		var Obrigacao  = $("input[name=hdnObrigacao]").val();
		var Acao =  $("textarea[name=txtAcaoSolicit]").val();
		var Nivel =  $("input[name=hdnNivel]").val();
		var OrigemA ="OrigemSolicit";
		var TipoNotifica_id =  $("input[name=hdnTipoNotifica_id_solicit]").val();

	
$.ajax({
"url":"CadastroPlanoAcao.php",
"dataType": "html",
"data": {
    "login" :login,
    "usuario_id" :usuario_id,
    sltResponsavel:Responsavel,
    DataPrazo:Prazo,
    hdnAutor:Autor,
    hdnCliente:Cliente,
	hdnObrigacao:Obrigacao,
	hdnNivel:Nivel,
	txtAcao:Acao, 
	hdnOrigemA:OrigemA,
	hdnTipoNotifica_id:TipoNotifica_id,
	
	
},
"success": function(response) {
	//em caso de sucesso, a div ID=saida recebe o response do post
	
	$("div.ListaAcao").html(response);

	var Responsavel =  $("select[name=sltResponsavelSolicit]").val('');
	var Prazo  = $("input[name=DataPrazoSolicit]").val('');
	var Acao =  $("textarea[name=txtAcaoSolicit]").val('');
	progresso();
 		
 			
 		}

 	});

 }
 	

//////////////////////////////////////////////////////////////////////////////////////
 
function solicita_acao() { 
	
	 var usuario_id = "<?php echo $usuario_id; ?>";
	 var SolocitAcao  = $("textarea[name=txtSolocitAcao]").val();
	 var Obrigacao  = $("input[name=hdnObrigacao]").val();
	
	$.ajax({
		"url":"CadastroSolicitaAcao.php",
		"dataType": "html",
		"data": {
		   "usuario_id" :usuario_id,	
		   txtSolocitAcao :SolocitAcao,
		   hdnObrigacao:Obrigacao,
		},
		"success": function(response) {
			//em caso de sucesso, a div ID=saida recebe o response do post
	    $("div.ConfirmaSolicitacao").html(response);
		$('#ModalConfirmaSolicitacao').modal('toggle');
		$('#ModalConfirmaSolicitacao').modal('show');
		$("textarea[name=txtSolocitAcao]").val('');
		
			
		}

	});

}
 
///////////////////////////////////////////////////////////////////////////////////////////// 
 
 
 $(document).ready(function() {


	 $(".btnSalvaAcao").click(function() {
		
		 var login;
	     login = "<?php echo $login; ?>";
	     usuario_id = "<?php echo $usuario_id; ?>";
			var Responsavel =  $("select[name=sltResponsavel]").val();
			var Prazo  = $("input[name=DataPrazo]").val();
			var Autor  = $("input[name=hdnAutor]").val();
			var Cliente  = $("input[name=hdnCliente]").val();
			var Obrigacao  = $("input[name=hdnObrigacao]").val();
			var Acao =  $("textarea[name=txtAcao]").val();
			var Nivel =  $("input[name=hdnNivel]").val();
			var OrigemA =  'OrigemNormal';
			

		
$.ajax({
	"url":"CadastroPlanoAcao.php",
	"dataType": "html",
	"data": {
	    "login" :login,
	    "usuario_id" :usuario_id,
	    sltResponsavel:Responsavel,
	    DataPrazo:Prazo,
	    hdnAutor:Autor,
	    hdnCliente:Cliente,
		hdnObrigacao:Obrigacao,
		hdnNivel:Nivel,
		txtAcao:Acao, 
		hdnOrigemA:OrigemA,
		
		
		
	},
	"success": function(response) {
		//em caso de sucesso, a div ID=saida recebe o response do post
		
		$("div.ListaAcao").html(response);

		var Responsavel =  $("select[name=sltResponsavel]").val('');
		var Prazo  = $("input[name=DataPrazo]").val('');
		var Acao =  $("textarea[name=txtAcao]").val('');
		progresso();
		
	}

});


		});
	 
/////////////////////////////////////////////////////////////////////////////////////
$(".btnSolicitaAcao").click(function() {

	solicita_acao()
});

/////////////////////////////////////////////////////////////////////////////////////
$(".btnSalvaAcaoSolicit").click(function() {

	salva_acao_solicit();
});
///////////////////////////////////////////////////////////////////////////////////// 
 }); // fim do $(document).ready(function()...      

progresso();
 
 


 </script>
 
 
       </body>
</html>
