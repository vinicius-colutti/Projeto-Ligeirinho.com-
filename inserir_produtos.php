<?php
$descricao = "";
$link = "";
$foto="";
$nome = "";

$valor = "";
$botao="Gravar";
session_start();
if($_SESSION['idNivel'] == 4){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}
include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	if ($modo=='excluir'){
		
		$idProduto=$_GET['idProduto'];
		$sql="delete from tblProdutos where idProduto=".$idProduto;
		mysql_query($sql);
		header('location:inserir_produtos.php');
		
		
	}else if($modo=='consultaeditar'){
		
		//PEGANDO DA URL OS IDS
		$idProduto=$_GET['idProduto'];
		$_SESSION['idProduto']=$idProduto;	
		$id_produto_user=$_GET['idSubCategoria'];	
		$sql="select * from tblProdutos where idProduto=".$idProduto;
		$select = mysql_query($sql);		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS			
			$descricao=$rsconsulta['descricaoProduto'];
			$valor=$rsconsulta['valorProduto'];
			$nome=$rsconsulta['nomeProduto'];
			$foto=$rsconsulta['imagem'];
				
			
			$botao="Alterar";
			
			
			
		}
		
		
		
		
	//ativar	
	}else if($modo == "ativar"){
		$idProduto=$_GET['idProduto'];
		$sql="update tblProdutos set ativado = 1 where idProduto=".$idProduto;
		$select=mysql_query($sql);
		header('location:inserir_produtos.php');
	
	}
	
	//desativar
	else if($modo == "desativar"){
		$idProduto=$_GET['idProduto'];
		$sql="update tblProdutos set ativado = 0 where idProduto=".$idProduto;
		$select=mysql_query($sql);
		header('location:inserir_produtos.php');
		
	}
	
	
}
//###################################################################################
if(isset($_POST['salvar_produto'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$descricao=$_POST['descricao_produto'];
	$valor=$_POST['valor_produto'];
	$nome=$_POST['nome_produto'];
	$id_sub_categoria=$_POST['option'];
	
	
	//variavel que guarda o nome da pasta de destino do arquivo
	$uploaddir = "arquivos_produtos/";
	//variavel que guarda o caminho de destino com o nome do arquivo, usuamos o comando 'basename' para extrair apenas o nome do arquivo
	$nome_arq= basename($_FILES['filefotos']['name']);
	$uploadfile = $uploaddir. $nome_arq;
	//movo o arquivo local para a pasta no servidor
	
	
	
	if ($_POST['salvar_produto'] == 'Gravar')
	{	
		echo("ENTREI NO IF DADOS");	
		$upload_ext = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
		if ($upload_ext == 'jpg' || $upload_ext == 'png'){
			
			
			
			if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile)){
				echo("entrei no if");
				$sql = "insert into tblProdutos(nomeProduto, imagem, valorProduto, descricaoProduto, idSubCategoria, ativado)values('".$nome."', '".$uploadfile."', '".$valor."', '".$descricao."', '".$id_sub_categoria."',  0)";
				mysql_query($sql);
				header('location:inserir_produtos.php');
			}else{
				
				echo("ERRO NO ENVIO DO ARQUIVO");
				
			}
			
		}else{
			echo "extensão inválida";
		}	
		
	}elseif($_POST['salvar_produto']=='Alterar')
	{
		
		//VERIFICANDO SE O INPUT FILE ESTÁ VAZIO
		if(empty($_FILES['filefotos']['name'])){
			
			$sql="update tblProdutos set nomeProduto='".$nome."', descricaoProduto='".$descricao."', valorProduto='".$valor."', idSubCategoria='".$id_sub_categoria."' where idProduto=".$_SESSION['idProduto'];
			mysql_query($sql);			
			header('location:inserir_produtos.php');
			
			
		}else{
			
			$upload_ext = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
			if ($upload_ext == 'jpg' || $upload_ext == 'png'){
				
				
				
				if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile)){
					
					$sql="update tblProdutos set nomeProduto='".$nome."', descricaoProduto='".$descricao."', valorProduto='".$valor."', imagem='".$uploadfile."' where idProduto=".$_SESSION['idProduto'];
					mysql_query($sql);			
					header('location:inserir_produtos.php');
					
					
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
		<title>Inserir Produtos Á</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<script src='js/api.js'></script>
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One|Bungee|Francois+One|Libre+Franklin|Patua+One|Ranga|Ropa+Sans|Sarala|Squada+One" rel="stylesheet">
		<meta charset="utf-8">
		<script> 
			function moeda(z){
			v = z.value;
			v=v.replace(/\D/g,"") // permite digitar apenas numero
			v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
			v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
			v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
			v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
			v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
			z.value = v;
			}
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
					<!--Principal Nav. -->
					<div id="principal_nav">
						<?php include 'menu_cms.php'; ?>
										<div id="div_txt_usuario">
											<?php echo"<span id='txt_usuario'>Seja Bem Vindo, ".$_SESSION['nome']."</span>" ?>
										
										
										</div>
											<div id="div_logout">
												<a href="logout.php" id="txt_logout">Logout</a>
											
											</div>
						
					</div>
					<!--Fim -->
				
				
				</nav>
					<!--Inicio da Section-->
					<section id="section_categoria">
							<div id="add_produtos">
								<form method='post' action='inserir_produtos.php' enctype="multipart/form-data" name='inserir_produtos'>	
								<!--Form para selecionar os niveis-->
								
									<label>Categoria:</label>
									<select name="option" class="niveis_usuarios_cadastro">
									
									
									
									<?php
									$sql = "select idSubCategoria, nomeSubCategoria from tblSubCategoria";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
										
									if($rs['idSubCategoria'] == $id_produto_user){
										
									?>
									<option value="<?php echo($rs['idSubCategoria']);?>" selected><?php echo($rs['nomeSubCategoria']);?></option>

									<?php		
										
										
									}else{
										
									?>	
										<option value="<?php echo($rs['idSubCategoria']);?>"><?php echo($rs['nomeSubCategoria']);?></option>
									<?php	
										
									}		
										
									
									?>
									<?php
									}
									
									?>
									</select>
									<br>							
									
									<label>Nome Produto:</label>
									<input required name="nome_produto" placeholder="Nome Produto" type="text" value="<?php echo($nome); ?>">
									<br>
									<label>Imagem</label>
									<input type="file" name="filefotos" value="">
									<br>
									<label>Descrição:</label>
									<input required name="descricao_produto" placeholder="Descrição" type="text" value="<?php echo($descricao); ?>">
									<br>
									<label>Valor:</label>
									<input required name="valor_produto" placeholder="Valor" type="text" value="<?php echo($valor); ?>" onkeyup="moeda(this);">	
									
									<input required id="botao_enviar_cadastro" name="salvar_produto" type="submit" value="<?php echo($botao);?>">
									
									 
								</form>
							</div>						
							
							<div id="div_select_produtos">
							<?php
							$sql="select * from tblProdutos";
							$select = mysql_query($sql);
										
							while ($rs=mysql_fetch_array($select)){
								
								if($rs['ativado'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
								}else{
									
									
									$ativar = "ativar_conteudo.0.png";
									
								}
						
						
							?>
								<div id="div_produto_detalhes"><?php echo($rs['nomeProduto']);?></div>
								<div id="div_produto_descricao"><?php echo($rs['descricaoProduto']);?></div>
									<div id="div_imagem"><img src="<?php echo($rs['imagem']); ?>" title="<?php echo($rs['valorProduto']); ?>"/></div>										
											<div id="div_opc_noticias">
												<div id="alterar_noticia"><a href="inserir_produtos.php?modo=consultaeditar&idProduto=<?php echo($rs['idProduto']);?>&idSubCategoria=<?php echo($rs['idSubCategoria']); ?>"><img src="imagens/edit_conteudo.png" /></a></div>
												<div id="excluir_noticia"><a href="inserir_produtos.php?modo=excluir&idProduto=<?php echo($rs['idProduto']);?>" onClick="javascript: return confirm('Deseja mesmo excluir?');"><img src="imagens/excluir_conteudo.png" /></a></div>
												<div id="ativar_noticia"><a href="inserir_produtos.php?modo=ativar&idProduto=<?php echo($rs['idProduto']);?>"><img src="imagens/<?php echo($ativar); ?>" /></a></div>
												<div id="ativar_noticia"><a href="inserir_produtos.php?modo=desativar&idProduto=<?php echo($rs['idProduto']);?>"><img src="imagens/desativar.png" /></a></div>
											</div>
											<div class="separar_conteudo_listado_produtos"></div>
							<?php
							}
							?>		
							</div>
							
					
					</section>
						<footer>
							<div id="div_footer">
							<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
							<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
							</div>
						
						
						</footer>
		</body>			
			
				
		
		
	




</html>