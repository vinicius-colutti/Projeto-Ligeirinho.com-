<?php
$preco = "";
$texto="";
$uploadfile = "";
$uploadfile_sld1 = "";
$uploadfile_sld2 = "";
$uploadfile_sld3 = "";
$uploadfile_sld4 = "";
$uploadfile_sld5 = "";
$id_produto = "";
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
	//excluir
	if ($modo=='excluir'){
		
		$idEventoDestaque=$_GET['idEventoDestaque'];
		$sql="delete from tblEventoDestaque where idEventoDestaque=".$idEventoDestaque;
		mysql_query($sql);
		header('location:inserir_evento_destaque.php?nome='.$nome.'');
		
		
	}else if($modo=='consultaeditar'){
		
		//pegando os ids da url
		$idEventoDestaque=$_GET['idEventoDestaque'];
		$_SESSION['idEventoDestaque']=$idEventoDestaque;
		$id_destaque_produto=$_GET['idProduto'];		
		$sql="select d.imagem, d.texto, p.nomeProduto from tbleventodestaque as d inner join tblprodutos as p on idEventoDestaque = ".$idEventoDestaque." and d.idProduto = p.idProduto;";
		$select = mysql_query($sql);
		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS 			
			$texto=$rsconsulta['texto'];
							
			
			$botao="Alterar";
			
			
			
		}
		
		
		
	}
	//ativar
	else if($modo == "ativar"){
		$idEventoDestaque=$_GET['idEventoDestaque'];
		$sql = "update tblEventoDestaque set ativarDestaque = 0";
		$select=mysql_query($sql);
		$sql="update tblEventoDestaque set ativarDestaque = 1 where idEventoDestaque=".$idEventoDestaque;
		$select=mysql_query($sql);
		header('location:inserir_evento_destaque.php?nome='.$nome.'');
		
	}
	//desativar
	else if($modo == "desativar"){
		$idEventoDestaque=$_GET['idEventoDestaque'];
		$sql="update tblEventoDestaque set ativarDestaque = 0 where idEventoDestaque=".$idEventoDestaque;
		$select=mysql_query($sql);
		header('location:inserir_evento_destaque.php?nome='.$nome.'');
		
	}
	
	
}
//###################################################################################
if(isset($_POST['salvar'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$texto=$_POST['texto'];
	$id_produto=$_POST['option'];	
	//variavel que guarda o nome da pasta de destino do arquivo
	$uploaddir = "arquivos_evento_destaque/";
	//variavel que guarda o caminho de destino com o nome do arquivo, usuamos o comando 'basename' para extrair apenas o nome do arquivo
	
	//todos os inputs file
	$nome_arq= basename($_FILES['filefotos']['name']);
	$uploadfile = $uploaddir. $nome_arq;
	$nome_arq_sld1= basename($_FILES['filefotos_sld1']['name']);
	$uploadfile_sld1 = $uploaddir. $nome_arq_sld1;
	$nome_arq_sld2= basename($_FILES['filefotos_sld2']['name']);
	$uploadfile_sld2 = $uploaddir. $nome_arq_sld2;
	$nome_arq_sld3= basename($_FILES['filefotos_sld3']['name']);
	$uploadfile_sld3 = $uploaddir. $nome_arq_sld3;
	$nome_arq_sld4= basename($_FILES['filefotos_sld4']['name']);
	$uploadfile_sld4 = $uploaddir. $nome_arq_sld4;
	$nome_arq_sld5= basename($_FILES['filefotos_sld5']['name']);
	$uploadfile_sld5 = $uploaddir. $nome_arq_sld5;
	//movo o arquivo local para a pasta no servidor
	
	
		
	
	
	if ($_POST['salvar'] == 'Gravar')
	{

		//gravando no banco
		//verificando todos os formatos dos arquivos
		echo("ENTREI NO IF DADOS");	
		$upload_ext1 = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
		$upload_ext2 = strtolower(substr($nome_arq_sld1,strlen($nome_arq_sld1)-3,3));
		$upload_ext3 = strtolower(substr($nome_arq_sld2,strlen($nome_arq_sld2)-3,3));
		$upload_ext4 = strtolower(substr($nome_arq_sld3,strlen($nome_arq_sld3)-3,3));
		$upload_ext5 = strtolower(substr($nome_arq_sld4,strlen($nome_arq_sld4)-3,3));
		$upload_ext6 = strtolower(substr($nome_arq_sld5,strlen($nome_arq_sld5)-3,3));
		if (($upload_ext1 == 'jpg' || $upload_ext1 == 'png') and ($upload_ext2 == 'jpg' || $upload_ext2 == 'png')and ($upload_ext3 == 'jpg' || $upload_ext3 == 'png')and ($upload_ext4 == 'jpg' || $upload_ext4 == 'png')and ($upload_ext5 == 'jpg' || $upload_ext5 == 'png')and ($upload_ext6 == 'jpg' || $upload_ext6 == 'png')){
			
			
			
			if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile) AND move_uploaded_file($_FILES['filefotos_sld1']['tmp_name'],$uploadfile_sld1) AND move_uploaded_file($_FILES['filefotos_sld2']['tmp_name'],$uploadfile_sld2) AND move_uploaded_file($_FILES['filefotos_sld3']['tmp_name'],$uploadfile_sld3) AND move_uploaded_file($_FILES['filefotos_sld4']['tmp_name'],$uploadfile_sld4) AND move_uploaded_file($_FILES['filefotos_sld5']['tmp_name'],$uploadfile_sld5) ){
				echo("entrei no if");
				$sql = "insert into tblEventoDestaque(imagem, texto, idProduto, img_slider1, img_slider2, img_slider3, img_slider4, img_slider5, ativarDestaque)values('".$uploadfile."', '".$texto."', '".$id_produto."', '".$uploadfile_sld1."', '".$uploadfile_sld2."', '".$uploadfile_sld3."', '".$uploadfile_sld4."', '".$uploadfile_sld5."', 0)";
				mysql_query($sql);
				header('location:inserir_evento_destaque.php');
			}else{
				
				echo("ERRO NO ENVIO DO ARQUIVO");
				
			}
			
		}else{
			echo "extensão inválida";
		}	
		
	}elseif($_POST['salvar']=='Alterar')
	{
		
			$upload_ext1 = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
			$upload_ext2 = strtolower(substr($nome_arq_sld1,strlen($nome_arq_sld1)-3,3));
			$upload_ext3 = strtolower(substr($nome_arq_sld2,strlen($nome_arq_sld2)-3,3));
			$upload_ext4 = strtolower(substr($nome_arq_sld3,strlen($nome_arq_sld3)-3,3));
			$upload_ext5 = strtolower(substr($nome_arq_sld4,strlen($nome_arq_sld4)-3,3));
			$upload_ext6 = strtolower(substr($nome_arq_sld5,strlen($nome_arq_sld5)-3,3));
			if (($upload_ext1 == 'jpg' || $upload_ext1 == 'png') and ($upload_ext2 == 'jpg' || $upload_ext2 == 'png')and ($upload_ext3 == 'jpg' || $upload_ext3 == 'png')and ($upload_ext4 == 'jpg' || $upload_ext4 == 'png')and ($upload_ext5 == 'jpg' || $upload_ext5 == 'png')and ($upload_ext6 == 'jpg' || $upload_ext6 == 'png')){
				
				
				
				if(move_uploaded_file($_FILES['filefotos']['tmp_name'],$uploadfile) AND move_uploaded_file($_FILES['filefotos_sld1']['tmp_name'],$uploadfile_sld1) AND move_uploaded_file($_FILES['filefotos_sld2']['tmp_name'],$uploadfile_sld2) AND move_uploaded_file($_FILES['filefotos_sld3']['tmp_name'],$uploadfile_sld3) AND move_uploaded_file($_FILES['filefotos_sld4']['tmp_name'],$uploadfile_sld4) AND move_uploaded_file($_FILES['filefotos_sld5']['tmp_name'],$uploadfile_sld5)){
					$sql="update tblEventoDestaque set imagem='".$uploadfile."', texto='".$texto."', img_slider1='".$uploadfile_sld1."', img_slider2='".$uploadfile_sld2."', img_slider3='".$uploadfile_sld3."', img_slider4='".$uploadfile_sld4."', img_slider5='".$uploadfile_sld5."', idProduto='".$id_produto."'  where idEventoDestaque=".$_SESSION['idEventoDestaque'];
					mysql_query($sql);			
					header('location:inserir_evento_destaque.php');
					
					
				}else{
					
					echo("ERRO NO ENVIO DO ARQUIVO");
					
				}
				
			}else{
				echo "extensão inválida";
			}	
		
	}	
	
	
}

?>
<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Inserir Evento Destaque</title>		
	<!--Muitas fontes bacanas -->
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
				<!--Inicio da NAV. -->
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
					<!--Inicio da SECTION. -->
					<section id="section_usuario">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_cadastro_evento_destaque">
							<div id="add_evento_destaque">
								<form method="post" action="inserir_evento_destaque.php" enctype="multipart/form-data" name="adm_promocao">
									<label>Produto:</label>
									<!--SELECT E IF DOS PRODUTOS PARA FICAR EM DESTAQUE, UTILZEI A MESMA CALSS DA PROMOÇÃO. -->
									<select name="option" class="produtos_para_promocionar">
									<?php
									$sql = "select idProduto, nomeProduto from tblProdutos";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
									if($rs['idProduto'] == $id_destaque_produto){
										
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
									<input type="file" name="filefotos" value="">									
									<br> 
									<div id="div_do_texto_do_evento_destaque"><label id="txt_texto_sobre_evento_destaque">Insira um texto sobre este evento</label></div>
									
									<textarea class="textos_inserir" name="texto" maxlength="400"><?php echo($texto);?></textarea>
									<br>
									<label>Slider 1</label>
									<input type="file" name="filefotos_sld1" value="">
									<br>
									<label>Slider 2</label>
									<input type="file" name="filefotos_sld2" value="">
									<br>
									<label>Slider 3</label>
									<input type="file" name="filefotos_sld3" value="">
									<br>
									<label>Slider 4</label>
									<input type="file" name="filefotos_sld4" value="">
									<br>
									<label>Slider 5</label>
									<input type="file" name="filefotos_sld5" value="">
									<br>									
									<input id="botao_enviar_cadastro" name="salvar" type="submit" value="<?php echo($botao);?>">
									 
								</form>
							</div>
						</div>	
							
							<div id="titulo_noticia"><h3>Todos os destaques cadastrados</h3></div>
							<!--TODOS OS DESTAQUES -->
							<div id="div_select_destaque">
							
							<?php
							$sql = "select * from tblEventoDestaque";
							$select=mysql_query($sql);
							
							while($rs=mysql_fetch_array($select)){
								
								if($rs['ativarDestaque'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
								}else{
									
									
									$ativar = "ativar_conteudo.0.png";
									
								}
								
								
								
								
							
							
							
							?>
								
								<div id="div_descricao_evento_destaque"><textarea class="text_texto_destaque"><?php echo($rs['texto']); ?></textarea></div>
									<div id="div_imagem"><img src="<?php echo($rs['imagem']); ?>"/></div>										
											<div id="div_opc_noticias">
												<div id="alterar_noticia"><a href="inserir_evento_destaque.php?modo=consultaeditar&idEventoDestaque=<?php echo($rs['idEventoDestaque']);?>&idProduto=<?php echo($rs['idProduto']);?>"><img src="imagens/edit_conteudo.png" /></a></div>
												<div id="excluir_noticia"><a href="inserir_evento_destaque.php?modo=excluir&idEventoDestaque=<?php echo($rs['idEventoDestaque']);?>" onClick="javascript: return confirm('Deseja mesmo excluir?');"><img src="imagens/excluir_conteudo.png" /></a></div>
												<div id="ativar_noticia"><a href="inserir_evento_destaque.php?modo=ativar&idEventoDestaque=<?php echo($rs['idEventoDestaque']);?>"><img src="imagens/<?php echo($ativar); ?>" /></a></div>
												<div id="ativar_noticia"><a href="inserir_evento_destaque.php?modo=desativar&idEventoDestaque=<?php echo($rs['idEventoDestaque']);?>"><img src="imagens/desativar.png" /></a></div>
											</div>
											<div class="separar_conteudo_listado_destaque"></div>
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