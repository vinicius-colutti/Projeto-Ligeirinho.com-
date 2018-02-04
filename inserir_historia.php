<?php
$descricao_img_1 = "";
$descricao_img_2 = "";
$texto_1 = "";
$texto_2 = "";
$texto_3 = "";
$botao="Gravar";
$imagem1 = "";
$foto = "";
//pegando o html do txt_foto_1 e colocando em uma varíavel em php
$txt_foto_1 = "<label>Primeira imagem</label>";
@session_start();
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}


include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	//excluir
	if ($modo=='excluir'){
		
		$idCorrida=$_GET['idCorrida'];
		$sql="delete from tblCorridaHistoria where idCorrida=".$idCorrida;
		mysql_query($sql);
		header('location:inserir_historia.php?nome='.$nome.'');
		
		
	}else if($modo=='consultaeditar'){
		
		//PEGANDO OS IDS DA URL
		$idCorrida=$_GET['idCorrida'];
		//var de sessão, para pegar o id da corrida
		$_SESSION['idCorrida']=$idCorrida;		
		$sql="select * from tblCorridaHistoria where idCorrida=".$idCorrida;
		$select = mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS		
			$descricao_img_1=$rsconsulta['descricaoImagem1'];
			$texto_1=$rsconsulta['texto1'];
			$texto_2=$rsconsulta['texto2'];
			$texto_3=$rsconsulta['texto3'];
			$descricao_img_2=$rsconsulta['descricaoImagem2'];
			$imagem1=$rsconsulta['imagem1'];							
			
			$botao="Alterar";
			
			
			
		}
		
		
		
		
	//ativar	
	}else if($modo == "ativar"){
		$idCorrida=$_GET['idCorrida'];
		$sql = "update tblCorridaHistoria set ativarHistoria = 0";
		$select=mysql_query($sql);
		$sql="update tblCorridaHistoria set ativarHistoria = 1 where idCorrida=".$idCorrida;
		$select=mysql_query($sql);
		header('location:inserir_historia.php?nome='.$nome.'');
		
	}
	//desativar
	else if($modo == "desativar"){
		$idCorrida=$_GET['idCorrida'];
		$sql="update tblCorridaHistoria set ativarHistoria = 0 where idCorrida=".$idCorrida;
		$select=mysql_query($sql);
		header('location:inserir_historia.php?nome='.$nome.'');
		
	}else if($modo == "editar_img"){
		
	
		
		$idCorrida=$_GET['idCorrida'];
		
		
		
		
		$botao="Alterar Imagens";
		
		
		
	}
	
	
}
//###################################################################################
if(isset($_POST['salvar'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$descricao_img_1=$_POST['descricao_img_1'];
	$descricao_img_2=$_POST['descricao_img_2'];
	$texto_1=$_POST['texto_1'];
	$texto_2=$_POST['texto_2'];
	$texto_3=$_POST['texto_3'];	
	//variavel que guarda o nome da pasta de destino do arquivo
	$uploaddir = "arquivos_historia/";
	//variavel que guarda o caminho de destino com o nome do arquivo, usuamos o comando 'basename' para extrair apenas o nome do arquivo
	$nome_arq_1= basename($_FILES['filefotos_1']['name']);
	$uploadfile_1 = $uploaddir. $nome_arq_1;
	$nome_arq_2= basename($_FILES['filefotos_2']['name']);
	$uploadfile_2 = $uploaddir. $nome_arq_2;	
	//movo o arquivo local para a pasta no servidor
		
	
	if ($_POST['salvar'] == 'Gravar')
	{	
		echo("ENTREI NO IF DADOS");	
		$upload_ext = strtolower(substr($nome_arq_1,strlen($nome_arq_1)-3,3));
		$upload_ext_2 = strtolower(substr($nome_arq_2,strlen($nome_arq_2)-3,3));
		if (($upload_ext == 'jpg' || $upload_ext == 'png') and ($upload_ext_2 == 'jpg' || $upload_ext_2 == 'png')){
			
			
			
			if(move_uploaded_file($_FILES['filefotos_1']['tmp_name'],$uploadfile_1) AND move_uploaded_file($_FILES['filefotos_2']['tmp_name'],$uploadfile_2)){
				echo("entrei no if");
				$sql = "insert into tblCorridaHistoria(imagem1, descricaoImagem1, texto1, texto2, texto3, imagem2, descricaoImagem2,  ativarHistoria)values('".$uploadfile_1."', '".$descricao_img_1."', '".$texto_1."', '".$texto_2."', '".$texto_3."', '".$uploadfile_2."', '".$descricao_img_2."', 0)";
				mysql_query($sql) or die(mysql_error());
				header('location:inserir_historia.php');
			}else{
				
				echo("ERRO NO ENVIO DO ARQUIVO");
				
			}
			
		}else{
			echo "extensão inválida";
		}	
		
	}elseif($_POST['salvar']=='Alterar')
	{
		//VERIFICANDO SE OS CAMPOS DAS ImageNS ESTÃO VAZIO
		if(empty($_FILES['filefotos_1']['name']) and empty($_FILES['filefotos_2']['name'])){
			
			$sql="update tblCorridaHistoria set  descricaoImagem1='".$descricao_img_1."', texto1='".$texto_1."', texto2='".$texto_2."', texto3='".$texto_3."', descricaoImagem2='".$descricao_img_2."'  where idCorrida=".$_SESSION['idCorrida'];
			mysql_query($sql);			
			header('location:inserir_historia.php');
			
			
		}else if(empty($_FILES['filefotos_1']['name'])){
		
			$upload_ext = strtolower(substr($nome_arq_1,strlen($nome_arq_1)-3,3));
			$upload_ext_2 = strtolower(substr($nome_arq_2,strlen($nome_arq_2)-3,3));
			if (($upload_ext_2 == 'jpg' || $upload_ext_2 == 'png')){
				
				
				
				if(move_uploaded_file($_FILES['filefotos_2']['tmp_name'],$uploadfile_2)){
					
					
					$sql="update tblCorridaHistoria set descricaoImagem1='".$descricao_img_1."', texto1='".$texto_1."', texto2='".$texto_2."', texto3='".$texto_3."', imagem2='".$uploadfile_2."', descricaoImagem2='".$descricao_img_2."'  where idCorrida=".$_SESSION['idCorrida'];
					mysql_query($sql);			
					header('location:inserir_historia.php');
					
					
				}else{
					
					echo("ERRO NO ENVIO DO ARQUIVO");
					mysql_error();
					
				}
				
			}else{
				echo "extensão inválida";
			}	
		
		}else if(empty($_FILES['filefotos_2']['name'])){
			$upload_ext = strtolower(substr($nome_arq_1,strlen($nome_arq_1)-3,3));
			$upload_ext_2 = strtolower(substr($nome_arq_2,strlen($nome_arq_2)-3,3));
			if (($upload_ext == 'jpg' || $upload_ext == 'png')){
				
				
				
				if(move_uploaded_file($_FILES['filefotos_1']['tmp_name'],$uploadfile_1)){
					
					
					$sql="update tblCorridaHistoria set descricaoImagem1='".$descricao_img_1."', texto1='".$texto_1."', texto2='".$texto_2."', texto3='".$texto_3."', imagem1='".$uploadfile_1."', descricaoImagem2='".$descricao_img_2."'  where idCorrida=".$_SESSION['idCorrida'];
					mysql_query($sql);			
					header('location:inserir_historia.php');
					
					
				}else{
					
					echo("ERRO NO ENVIO DO ARQUIVO");
					mysql_error();
					
				}
				
			}else{
				echo "extensão inválida";
			}	
			
			
			
			
		}
		//FIM
			
	}	
	
}

?>
<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Inserir Histórias</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One|Bungee|Francois+One|Libre+Franklin|Patua+One|Ranga|Ropa+Sans|Sarala|Squada+One" rel="stylesheet">
		<meta charset="utf-8">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		  <link rel="stylesheet" href="/resources/demos/style.css">
		  <script src="js/jquery-1.12.4.js"></script>
		  <script src="js/jquery-ui.js"></script>
		  
		  <!--acordion para os textos -->
		  <script>
		  $( function() {

			$( ".accordion" ).accordion();
		  } );
		  </script>
		 
		 
		
	</head>
	
		<body>
		
			<header>
				<div id="principal_cabecalho">
					<div id="titulo_cms">
					<b>CMS</b> <span id="titulo">- Sistema de Gerenciamento do Site</span>
					
					</div>
					
						<div id="logo_cms">
						
							<a href="cms_home.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><img src="imagens/cms_logo.png" title="Sistema de Gerenciamento" alt="Sistema de Gerenciamento"/></a>
						
						</div>
				
				
				
				
				</div>
			
			</header>
				<nav>					
				<!--INICIO DA NAV. -->
					<div id="principal_nav">
						<?php include 'menu_cms.php'; ?>
										<div id="div_txt_usuario">
											<?php echo"<span id='txt_usuario'>Seja Bem Vindo, ".$_SESSION['nome']."</span>" ?>
										
										
										</div>
											<div id="div_logout">
												<a href="logout.php" id="txt_logout">Logout</a>
											
											</div>
						
					</div>					
					<!--FIM. -->
				
				
				</nav>
					<!--INICIO DA SECTION -->
					<section id="section_usuario">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="edit_img" class="edit_img">
						
						
						</div>
						<div id="principal_cadastro_historia">
							<div id="add_evento_destaque">
								<form method="post" action="inserir_historia.php" enctype="multipart/form-data" name="adm_historia">								
									
									<label>Primeira Imagem</label>
									<input  type='file' name='filefotos_1' value=''>									
									<br>
									<label>Descrição da Imagem</label>	
									<input required placeholder="Descrição da imagem" type="text" name="descricao_img_1" maxlength="58" value="<?php echo($descricao_img_1); ?>">
									<br>
									<div id="div_do_texto_do_evento_destaque"><label id="txt_texto_sobre_evento_destaque">Primeiro texto</label></div>									
									<textarea class="textos_inserir" name="texto_1" maxlength="765" required><?php echo($texto_1); ?></textarea>
									<br>
									<div id="div_do_texto_do_evento_destaque"><label id="txt_texto_sobre_evento_destaque">Segundo texto</label></div>
									<textarea class="textos_inserir" name="texto_2" maxlength="1070" required><?php echo($texto_2); ?></textarea>
									<br>
									<label>Segunda imagem</label>
									<input  name="filefotos_2" type='file' value="<?php echo($imagem1);?>">									
									<br>									
									<label>Descrição da imagem</label>									
									<input required placeholder="Descrição da imagem" type="text" name="descricao_img_2" maxlength="58" value="<?php echo($descricao_img_2); ?>">
									<br>	
									<div id="div_do_texto_do_evento_destaque"><label id="txt_texto_sobre_evento_destaque">Terceiro texto</label></div>									
									<textarea class="textos_inserir" name="texto_3" maxlength="410" required><?php echo($texto_3); ?></textarea>
									<br>	
									<input id="botao_enviar_cadastro" name="salvar" type="submit" value="<?php echo($botao);?>">
									 
								</form>
							</div>						
						</div>	
							
							<div id="titulo_historia"><h3>Todas as histórias cadastradas</h3></div>
							<!--TODAS AS HISTORIAS CADASTRADAS. -->
							<div id="div_select_historia">
								<?php
								
								$sql = "select * from tblCorridaHistoria";
								$select = mysql_query($sql);
								
								while($rs=mysql_fetch_array($select)){
									if($rs['ativarHistoria'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
									}else{
										
										
										$ativar = "ativar_conteudo.0.png";
										
									}
									
									
								?>
							
									<div class="accordion">
									  <h3>Primeiro Texto</h3>
									  <div class="teste_css">
										<p>
										<?php echo($rs['texto1']);?>
										</p>
									  </div>
									  <h3>Segundo Texto</h3>
									  <div>
										<p>
										<?php echo($rs['texto2']);?>
										</p>
									  </div>
									  <h3>Terceiro Texto</h3>
									  <div>
										<p>
										<?php echo($rs['texto3']);?>
										</p>
										
									  </div>
									  
									</div>
									
									
									<div class="img_1_historia" ><img src="<?php echo($rs['imagem1']);?>" title="<?php echo($rs['descricaoImagem1']);?>"/></div>
									<div class="img_1_historia"><img src="<?php echo($rs['imagem2']);?>" title="<?php echo($rs['descricaoImagem2']);?>" /></div>
									<div class="opc_historia">										
										<div class="excluir_historia"><a  href="inserir_historia.php?modo=consultaeditar&idCorrida=<?php echo($rs['idCorrida']);?>"><img class="img_historia_icon" src="imagens/edit_conteudo.png" /></a></div>
										<div class="excluir_historia"><a  href="inserir_historia.php?modo=excluir&idCorrida=<?php echo($rs['idCorrida']);?>" onClick="javascript: return confirm('Deseja mesmo excluir?');"><img class="img_historia_icon" src="imagens/excluir_conteudo.png" /></a></div>
										<div class="excluir_historia"><a  href="inserir_historia.php?modo=ativar&idCorrida=<?php echo($rs['idCorrida']);?>"><img class="img_historia_icon" src="imagens/<?php echo($ativar);?>" /></a></div>
										<div class="excluir_historia"><a  href="inserir_historia.php?modo=desativar&idCorrida=<?php echo($rs['idCorrida']);?>"><img class="img_historia_icon" src="imagens/desativar.png" /></a></div>
									
									
									</div>
									<div class="separar_historia"></div>
								<?php
								}
								
								?>
							
								
							</div>
							<!--FIM. -->
						
					
					</section>
					<!--FIM. -->
						<footer>
							<div id="div_footer">
							<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
							<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
							</div>
						
						
						</footer>
		</body>			
			
				
		
		
	




</html>