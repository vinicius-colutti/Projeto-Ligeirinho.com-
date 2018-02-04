<?php
$descricao = "";
$link = "";
$foto="";
$botao="Gravar";
@session_start();
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}

include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	if ($modo=='excluir'){
		
		$idNoticia=$_GET['idNoticia'];
		$sql="delete from tblNoticias where idNoticia=".$idNoticia;
		mysql_query($sql);
		header('location:inserir_noticias.php?nome='.$nome.'');
		
		
	}else if($modo=='consultaeditar'){
		
		//PEGANDO DA URL OS IDS
		$idNoticia=$_GET['idNoticia'];
		$_SESSION['idNoticia']=$idNoticia;		
		$sql="select * from tblNoticias where idNoticia=".$idNoticia;
		$select = mysql_query($sql);		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS			
			$descricao=$rsconsulta['descricao'];
			$foto=$rsconsulta['imagemNoticia'];
				
			
			$botao="Alterar";
			
			
			
		}
		
		
		
		
	//ativar	
	}else if($modo == "ativar"){
		$idNoticia=$_GET['idNoticia'];
		$sql="update tblNoticias set ativarNoticia = 1 where idNoticia=".$idNoticia;
		$select=mysql_query($sql);
		header('location:inserir_noticias.php?nome='.$nome.'');
	
	}
	
	//desativar
	else if($modo == "desativar"){
		$idNoticia=$_GET['idNoticia'];
		$sql="update tblNoticias set ativarNoticia = 0 where idNoticia=".$idNoticia;
		$select=mysql_query($sql);
		header('location:inserir_noticias.php?nome='.$nome.'');
		
	}
	
	
}
//###################################################################################
if(isset($_POST['salvar'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$descricao=$_POST['descricao'];
	
	//variavel que guarda o nome da pasta de destino do arquivo
	$uploaddir = "arquivos_noticia/";
	//variavel que guarda o caminho de destino com o nome do arquivo, usuamos o comando 'basename' para extrair apenas o nome do arquivo
	$nome_arq= basename($_FILES['filefotos']['name']);
	$uploadfile = $uploaddir. $nome_arq;
	//movo o arquivo local para a pasta no servidor
	
	
	
	if ($_POST['salvar'] == 'Gravar')
	{	
		echo("ENTREI NO IF DADOS");	
		$upload_ext = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
		if ($upload_ext == 'jpg' || $upload_ext == 'png'){
			
			
			
			if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile)){
				echo("entrei no if");
				$sql = "insert into tblNoticias(descricao, imagemNoticia, ativarNoticia)values('".$descricao."', '".$uploadfile."', 0)";
				mysql_query($sql);
				header('location:inserir_noticias.php');
			}else{
				
				echo("ERRO NO ENVIO DO ARQUIVO");
				
			}
			
		}else{
			echo "extensão inválida";
		}	
		
	}elseif($_POST['salvar']=='Alterar')
	{
		
		//VERIFICANDO SE O INPUT FILE ESTÁ VAZIO
		if(empty($_FILES['filefotos']['name'])){
			
			$sql="update tblNoticias set descricao='".$descricao."' where idNoticia=".$_SESSION['idNoticia'];
			mysql_query($sql);			
			header('location:inserir_noticias.php');
			
			
		}else{
			
			$upload_ext = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
			if ($upload_ext == 'jpg' || $upload_ext == 'png'){
				
				
				
				if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile)){
					
					$sql="update tblNoticias set descricao='".$descricao."', imagemNoticia='".$uploadfile."' where idNoticia=".$_SESSION['idNoticia'];
					mysql_query($sql);			
					header('location:inserir_noticias.php');
					
					
				}else{
					
					echo("ERRO NO ENVIO DO ARQUIVO");
					mysql_error();
					
				}
				
			}else{
				echo "extensão inválida";
			}	
			
		}
			
	}	
	
	
}

?>
<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Inserir Notícias</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One|Bungee|Francois+One|Libre+Franklin|Patua+One|Ranga|Ropa+Sans|Sarala|Squada+One" rel="stylesheet">
		<meta charset="utf-8">
	
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
					<!--inicio da nav. -->
					<div id="principal_nav">					
						<?php include 'menu_cms.php'; ?>
										<div id="div_txt_usuario">
											<?php echo"<span id='txt_usuario'>Seja Bem Vindo, ".$_SESSION['nome']."</span>" ?>
										
										
										</div>
											<div id="div_logout">
												<a href="logout.php" id="txt_logout">Logout</a>
											
											</div>
						
					</div>
					<!--fim -->
				
				
				</nav>
					<!--INICIO DA SECTION. -->
					<section id="section_usuario">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_cadastro_noticia">
							<div id="add_noticia">
								<form method="post" action="inserir_noticias.php" enctype="multipart/form-data" name="adm_noticias">
 
									<label>Imagem</label>
									<input type="file" name="filefotos" value="<?php echo($foto); ?>">
									<br>
									<label>Descrição</label>
									<input name="descricao" placeholder="Descrição da notícia" type="text" value="<?php echo($descricao); ?>" maxlength="40">									
									<br>									
									<input id="botao_enviar_cadastro" name="salvar" type="submit" value="<?php echo($botao);?>">
									 
								</form>
							</div>
						</div>	
							<!--TODAS AS NOTÍCIAS. -->
							<div id="titulo_noticia"><h3>Todas as Notícias cadastradas</h3></div>
							
							<div id="div_select_noticias">
							<?php
							$sql="select * from tblNoticias";
							$select = mysql_query($sql);
										
							while ($rs=mysql_fetch_array($select)){
								
								if($rs['ativarNoticia'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
								}else{
									
									
									$ativar = "ativar_conteudo.0.png";
									
								}
						
						
							?>
								<div id="div_descricao"><?php echo($rs['descricao']);?></div>
									<div id="div_imagem"><img src="<?php echo($rs['imagemNoticia']); ?>"/></div>										
											<div id="div_opc_noticias">
												<div id="alterar_noticia"><a href="inserir_noticias.php?modo=consultaeditar&idNoticia=<?php echo($rs['idNoticia']);?>"><img src="imagens/edit_conteudo.png" /></a></div>
												<div id="excluir_noticia"><a href="inserir_noticias.php?modo=excluir&idNoticia=<?php echo($rs['idNoticia']);?>" onClick="javascript: return confirm('Deseja mesmo excluir?');"><img src="imagens/excluir_conteudo.png" /></a></div>
												<div id="ativar_noticia"><a href="inserir_noticias.php?modo=ativar&idNoticia=<?php echo($rs['idNoticia']);?>"><img src="imagens/<?php echo($ativar); ?>" /></a></div>
												<div id="ativar_noticia"><a href="inserir_noticias.php?modo=desativar&idNoticia=<?php echo($rs['idNoticia']);?>"><img src="imagens/desativar.png" /></a></div>
											</div>
											<div class="separar_conteudo_listado"></div>
							<?php
							}
							?>		
							</div>
						
						
						
						
							
								
					
					
					
					
					</section>
					<!--FIM-->
						<footer>
							<div id="div_footer">
							<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
							<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
							</div>
						
						
						</footer>
		</body>			
			
				
		
		
	




</html>