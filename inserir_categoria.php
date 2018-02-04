<?php
$nome = "";
$id_categoria = "";
$botao="Gravar Sub Categoria";
$opts = "";
$nome_categoria = "";
session_start();
if($_SESSION['idNivel'] == 4){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}

$form_user = "<form method='post' action='verificacaptcha.php' name='adm_usuarios'>";

$botao_cat="Gravar Categoria";


include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];

$nivel_sessao = $_SESSION['idNivel'];
$idUsuario = $_SESSION['idUsuario'];
include_once 'conectar_banco.php';

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	//excluir
	if ($modo=='excluir'){		
		
		$codigo=$_GET['idSubCategoria'];		
				
		$sql="delete from tblSubCategoria where idSubCategoria=".$codigo;
		mysql_query($sql);
		header('location:inserir_categoria.php?');
				
			
		
		
		
		
		
	}else if($modo=='consultaeditar'){
		
		//RETIRA DA URL O CODIGO DO REGISTRO ENVIADO PELO LINK
		$codigo=$_GET['idSubCategoria'];
		$id_categoria_user=$_GET['idCategoria'];	
		$_SESSION['idAlterar']=$codigo;		
		
		$sql="select * from tblSubCategoria where idSubCategoria =".$codigo;
		$select = mysql_query($sql);
		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS			
			$nome=$rsconsulta['nomeSubCategoria'];			
			$botao="Alterar";
			
		}
		
		
	}else if($modo=='consultaeditar_categoria'){
		
		
		$idCategoria=$_GET['idCategoria'];
		$_SESSION['idCategoria']=$idCategoria;
		
		$sql="select * from tblCategoria where idCategoria=".$idCategoria;
		$select= mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS PARA NÍVEIS	
			$nome_categoria=$rsconsulta['nomeCategoria'];
			$botao_cat="Alterar";
			
			
			
		}
		
		
		
	}
	
	else if($modo=='excluir_categoria'){
		
		$idCategoria=$_GET['idCategoria'];
		$sql="delete from tblCategoria where idCategoria=".$idCategoria;
		mysql_query($sql) or die(mysql_error());
		header('location:inserir_categoria.php');
		
	}
	
	
}
//###################################################################################


//salvar categoria
if(isset($_POST['salvar_categoria'])){
	$nome_cat=$_POST['nome_categoria'];
	
	if($_POST['salvar_categoria'] == 'Gravar Categoria'){
	
	$sql="insert into tblCategoria(nomeCategoria)values('".$nome_cat."')";
	}elseif($_POST['salvar_categoria'] == 'Alterar'){
		$sql="update tblCategoria set nomeCategoria='".$nome_cat."' where idCategoria=".$_SESSION['idCategoria'];
	}	
	mysql_query($sql);
	header('location:inserir_categoria.php?nome='.$nome.'');
	
	
	
	
}



if(isset($_POST['salvar_sub_categoria'])){
	$nome=$_POST['nomeSubCategoria'];
	$id_categoria=$_POST['option'];
	if ($_POST['salvar_sub_categoria'] == 'Gravar Sub Categoria'){
		
		
				
		$sql="insert into tblSubCategoria(nomeSubCategoria, idCategoria)values('".$nome."', '".$id_categoria."')";
		
	}elseif($_POST['salvar_sub_categoria'] == 'Alterar'){
			
					
					
					$sql="update tblSubCategoria set nomeSubCategoria='".$nome."', idCategoria='".$id_categoria."' where idSubCategoria=".$_SESSION['idAlterar'];
					
	}

	mysql_query($sql) or die(mysql_error());
	header('location:inserir_categoria.php');
}


?>


<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Categoria</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<script src='js/api.js'></script>
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
							<div id="add_sub_categoria">
								<form method='post' action='inserir_categoria.php' name='sub_categoria'>	
								<!--Form para selecionar os niveis-->
								
									<label>Categoria:</label>
									<select name="option" class="niveis_usuarios_cadastro">
									
									
									
									<?php
									$sql = "select idCategoria, nomeCategoria from tblCategoria";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
										
									if($rs['idCategoria'] == $id_categoria_user){
										
									?>
									<option value="<?php echo($rs['idCategoria']);?>" selected><?php echo($rs['nomeCategoria']);?></option>

									<?php		
										
										
										
										
										
									}else{
										
									?>	
										<option value="<?php echo($rs['idCategoria']);?>"><?php echo($rs['nomeCategoria']);?></option>
									<?php	
										
									}		
										
										
										
									
									
									?>
									<?php
									}
									
									?>
									</select>
									<br>
									<label>Nome Sub:</label>
									<input required name="nomeSubCategoria" placeholder="Sub Categoria" type="text" value="<?php echo($nome); ?>">
									
									<input required id="botao_enviar_cadastro" name="salvar_sub_categoria" type="submit" value="<?php echo($botao);?>">
									
									 
								</form>
							</div>
							
							<div id="select_sub_cat">
								<?php
									$sql = "select sc.nomeSubCategoria, sc.idSubCategoria, sc.idCategoria, c.nomeCategoria from tblsubcategoria as sc inner join tblcategoria as c on sc.idCategoria = c.idCategoria;";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
									
								
								
								
								
								?>
							
									<div class="nome_sub"><?php echo($rs['nomeSubCategoria']);?></div>
									<div class="nome_sub"><?php echo($rs['nomeCategoria']);?></div>
									<div class="opc_niveis">
										<div class="alterar_nivel">
										<a href="inserir_categoria.php?modo=consultaeditar&idSubCategoria=<?php echo($rs['idSubCategoria']);?>&idCategoria=<?php echo($rs['idCategoria']);?> "><img src="imagens/edit_nivel.png" class="img_nivel"/></a>
										</div>
										<div class="exlcuir_nivel">
										<a href="inserir_categoria.php?modo=excluir&idSubCategoria=<?php echo($rs['idSubCategoria']);?>" onClick="javascript: return confirm('Deseja Excluir?');"><img src="imagens/excluir_nivel.png" class="img_nivel"/></a>
										</div>
										
										
									
									</div>
									
									
									
								
								<?php
								
									}
								
								?>
									
									
									
							</div>
							<div id="separar_categoria"></div>
							<div id="add_categoria">
								<form method='post' action='inserir_categoria.php' name='categoria'>		
								<!--Form para selecionar os niveis-->
								
									<br>
									<label>Nome Cat:</label>
									<input required name="nome_categoria" placeholder="Categoria" type="text" value="<?php echo($nome_categoria); ?>">
									
									<input id="botao_enviar_cadastro" name="salvar_categoria" type="submit" value="<?php echo($botao_cat);?>">
									
									 
								</form>
							</div>
							<div id="div_select_categoria">
								<?php
									$sql = "select * from tblCategoria";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
									
								
								
								
								
								?>
							
									<div class="nome_nivel"><?php echo($rs['nomeCategoria']);?></div>
									<div class="opc_niveis">
										<div class="alterar_nivel">
										<a href="inserir_categoria.php?modo=consultaeditar_categoria&idCategoria=<?php echo($rs['idCategoria']);?> "><img src="imagens/edit_nivel.png" class="img_nivel"/></a>
										</div>
										<div class="exlcuir_nivel">
										<a href="inserir_categoria.php?modo=excluir_categoria&idCategoria=<?php echo($rs['idCategoria']);?>" onClick="javascript: return confirm('Deseja Excluir? Não esqueca de verificar se há subs- categorias há utilizando.');"><img src="imagens/excluir_nivel.png" class="img_nivel"/></a>
										</div>
										
										
									
									</div>
									<div class="separar_niveis"></div>
								
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