<?php
$preco = "";
$foto="";
$botao="Gravar";


include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';
@session_start();
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	if ($modo=='excluir'){
		
		$idPromocoes=$_GET['idPromocoes'];
		$sql="delete from tblPromocoes where idPromocoes=".$idPromocoes;
		mysql_query($sql);
		header('location:inserir_promocoes.php?nome='.$nome.'');
		
		
	}else if($modo=='consultaeditar'){
		
		//RETIRA DA URL O CODIGO DO REGISTRO ENVIADO PELO LINK
		$idPromocoes=$_GET['idPromocoes'];
		$_SESSION['idPromocoes']=$idPromocoes;
		$id_produto_promo=$_GET['idProduto'];	
		//BUSCA NO DB O REGISTRO CONFORME O CODIGO FORNECIDO
		$sql="select pm.imagemPromocao, pm.precoPromocao, p.nomeProduto FROM tblpromocoes as pm inner join tblprodutos as p ON idPromocoes = ".$idPromocoes." and pm.idProduto = p.idProduto;";
		$select = mysql_query($sql);
		
		//TRANSFOMRA O RESULTADO DSO BD EM ARRAY E GUARDA NA VARIAVEL $rsconsulta
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS LOCAIS			
			$foto=$rsconsulta['imagemPromocao'];
			$preco=$rsconsulta['precoPromocao'];				
			
			$botao="Alterar";
			
			
			
		}
		
		
		
		
		
	}else if($modo == "ativar"){
		$idPromocoes=$_GET['idPromocoes'];
		$sql="update tblPromocoes set ativarPromocao = 1 where idPromocoes=".$idPromocoes;
		$select=mysql_query($sql);
		header('location:inserir_promocoes.php?nome='.$nome.'');
		
	}else if($modo == "desativar"){
		$idPromocoes=$_GET['idPromocoes'];
		$sql="update tblPromocoes set ativarPromocao = 0 where idPromocoes=".$idPromocoes;
		$select=mysql_query($sql);
		header('location:inserir_promocoes.php?nome='.$nome.'');
		
	}
	
	
}
//###################################################################################
if(isset($_POST['salvar'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$preco_promocao=$_POST['preco'];
	$id_produto=$_POST['option'];	
	//variavel que guarda o nome da pasta de destino do arquivo
	$uploaddir = "arquivos_promocoes/";
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
				$sql = "insert into tblPromocoes(imagemPromocao, precoPromocao, idProduto, ativarPromocao)values('".$uploadfile."', '".$preco_promocao."', '".$id_produto."', 0)";
				mysql_query($sql);
				header('location:inserir_promocoes.php');
			}else{
				
				echo("ERRO NO ENVIO DO ARQUIVO");
				
			}
			
		}else{
			echo "extensão inválida";
		}	
		
	}elseif($_POST['salvar']=='Alterar')
	{
		//VERIFICA SE O INPUT FILE ESTÁ VAZIO
		if(empty($_FILES['filefotos']['name'])){
			
			$sql="update tblPromocoes set precoPromocao='".$preco_promocao."' where idPromocoes=".$_SESSION['idPromocoes'];
			mysql_query($sql);			
			header('location:inserir_promocoes.php');
			
			
		}else{
		
			$upload_ext = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
			if ($upload_ext == 'jpg' || $upload_ext == 'png'){
				
				
				
				if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile)){
					$sql="update tblPromocoes set imagemPromocao='".$uploadfile."', precoPromocao='".$preco_promocao."' where idPromocoes=".$_SESSION['idPromocoes'];
					mysql_query($sql);			
					header('location:inserir_promocoes.php');
					
					
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
		<title>Inserir Promoções</title>
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
				<!--inicio da NAV. -->
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
					<!--inicio do section. -->
					<section id="section_usuario">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_cadastro_noticia">
							<div id="add_noticia">
								<!--form para inserir promocao. -->
								<form method="post" action="inserir_promocoes.php" enctype="multipart/form-data" name="adm_promocao">
									<label>Produto:</label>
									
									<select name="option" class="produtos_para_promocionar"><?php
									$sql = "select idProduto, nomeProduto from tblProdutos";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
									if($rs['idProduto'] == $id_produto_promo){
										
									?>
									<option value="<?php echo($rs['idProduto']);?>" selected><?php echo($rs['nomeProduto']);?></option>

									<?php		
										
										
										
										
										
									}else{
										
									?>	
										<option value="<?php echo($rs['idProduto']);?>"><?php echo($rs['nomeProduto']);?></option>
									<?php	
										
									}		
										
										
										
									
										
									?>	
									
									
									
									<?php
									}
									
									?>
									</select>
									
									<br>
									<label>Imagem</label>
									<input type="file" name="filefotos" value="<?php echo($foto); ?>">									
									<br> 
									<label>Preço Promocional</label>
									<input name="preco" placeholder="R$00,00" type="text" value="<?php echo($preco); ?>">
									<br>									
									<input id="botao_enviar_cadastro" name="salvar" type="submit" value="<?php echo($botao);?>">
									 
								</form>
							</div>
						</div>	
							
							<div id="titulo_noticia"><h3>Todas as notícias cadastradas</h3></div>
							<!--SELECIONAR TODAS AS PROMOÇÕES. -->
							<div id="div_select_noticias">
							
							<?php
							$sql = "select * from tblPromocoes";
							$select=mysql_query($sql);
							
							while($rs=mysql_fetch_array($select)){
								
								if($rs['ativarPromocao'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
								}else{
									
									
									$ativar = "ativar_conteudo.0.png";
									
								}
								
								
								
								
							
							
							
							?>
								
								<div id="div_descricao"><?php echo($rs['precoPromocao']);?></div>
									<div id="div_imagem"><img src="<?php echo($rs['imagemPromocao']); ?>"/></div>										
											<div id="div_opc_noticias">
												<div id="alterar_noticia"><a href="inserir_promocoes.php?modo=consultaeditar&idPromocoes=<?php echo($rs['idPromocoes']);?>&idProduto=<?php echo($rs['idProduto']);?>"><img src="imagens/edit_conteudo.png" /></a></div>
												<div id="excluir_noticia"><a href="inserir_promocoes.php?modo=excluir&idPromocoes=<?php echo($rs['idPromocoes']);?>" onClick="javascript: return confirm('Deseja mesmo excluir?');"><img src="imagens/excluir_conteudo.png" /></a></div>
												<div id="ativar_noticia"><a href="inserir_promocoes.php?modo=ativar&idPromocoes=<?php echo($rs['idPromocoes']);?>"><img src="imagens/<?php echo($ativar); ?>" /></a></div>
												<div id="ativar_noticia"><a href="inserir_promocoes.php?modo=desativar&idPromocoes=<?php echo($rs['idPromocoes']);?>"><img src="imagens/desativar.png" /></a></div>
											</div>
											<div class="separar_conteudo_listado"></div>
							<?php
							
							}
							

							?>		
								
								
							</div>
						
						
						
						
							
								
					
					
					
					
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