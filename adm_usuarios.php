<?php
$nome = "";
$sobrenome="";
$login="";
$senha="";	
$nome_nivel = "";
$id_nivel = "";
$botao="Gravar Dados";
$opts = "";
@session_start();
if($_SESSION['idNivel'] == 4){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}




$form_user = "<form method='post' action='verificacaptcha.php' name='adm_usuarios'>";

$botao_nivel="Gravar Nível";


include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];

$nivel_sessao = $_SESSION['idNivel'];
$idUsuario = $_SESSION['idUsuario'];
include_once 'conectar_banco.php';

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	//excluir
	if ($modo=='excluir'){
		
		
		
		
		$codigo=$_GET['codigo'];
		$nomeUsuario=$_GET['nome'];
		$sql="select u.idNivel from tblusuarios as u where u.idUsuario=".$idUsuario;
		
		$select=mysql_query($sql);
		
		$ni = mysql_fetch_array($select);
		if($ni['idNivel'] == 1){
		
		
			
			$sql="select nome from tblUsuarios where idUsuario=".$codigo;
			
			$select=mysql_query($sql);
			
			$n = mysql_fetch_array($select);
			
			if($n['nome'] == $nome_sessao){
				
			?>
				<script>
				
				alert("Você não pode excluir este usuário, ele está sendo utilizado em uma sessão no momento...");
				</script>

			<?php	
				
				
				
			}else{
				
			$sql="delete from tblUsuarios where idUsuario=".$codigo;
			mysql_query($sql);
			header('location:adm_usuarios.php?nome='.$nome.'');
				
				
			}
		
		}else{
			
			?>
				<script>
				
				alert("Você não tem permissões para executar está ação");
				</script>

			<?php
			
			
			
		}
		
		
		
		
		
	}else if($modo=='consultaeditar'){
		
		//RETIRA DA URL O CODIGO DO REGISTRO ENVIADO PELO LINK
		$codigo=$_GET['codigo'];
		$id_nivel_user=$_GET['idNivel'];	
		$_SESSION['idAlterar']=$codigo;		
		
		$sql="select u.nome, u.sobrenome, u.login, u.senha, n.nomeNivel from tblusuarios as u inner join tblnivelusuario as n ON idUsuario =".$codigo." and u.idNivel = n.idNivel";
		$select = mysql_query($sql);
		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS			
			$nome=$rsconsulta['nome'];
			$sobrenome=$rsconsulta['sobrenome'];
			$login=$rsconsulta['login'];
			$senha=$rsconsulta['senha'];		
			
			$botao="Alterar";
			
			
			
		}
		
		
		
		
		
	}else if($modo=='consultaeditar_nivel'){
		
		
		$idNivel=$_GET['idNivel'];
		$_SESSION['idNivel']=$idNivel;
		
		$sql="select * from tblNivelUsuario where idNivel=".$idNivel;
		$select= mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS PARA NÍVEIS	
			$nome_nivel=$rsconsulta['nomeNivel'];
			$botao_nivel="Alterar";
			
			
			
		}
		
		
		
	}
	//EXCLUIR NÍVEL
	else if($modo=='excluir_nivel'){
		
		
		
		
		$idNivel=$_GET['idNivel'];
		
		$sql="select u.idNivel from tblusuarios as u where u.idUsuario=".$idUsuario;
		
		$select=mysql_query($sql);
		
		$n = mysql_fetch_array($select);
		//verificando se o cara é admistrador
		if($n['idNivel'] == 1){
			$sql="delete from tblNivelUsuario where idNivel=".$idNivel;
			mysql_query($sql);
			header('location:adm_usuarios.php?nome='.$nome.'');
			
		}else{
			?>
			<script>
			
			alert("Você não possui permissões para executar está ação");
			
			</script>
			
			
			
			<?php
			
			
			
		}
		
		
		
		
	}
	
	
}
//###################################################################################


//salvar nivel
if(isset($_POST['salvar_nivel'])){
	$nome_nivel=$_POST['nome_nivel'];
	
	if($_POST['salvar_nivel'] == 'Gravar Nível'){
	
	$sql="insert into tblNivelUsuario(nomeNivel)values('".$nome_nivel."')";
	}elseif($_POST['salvar_nivel'] == 'Alterar'){
		$sql="update tblNivelUsuario set nomeNivel='".$nome_nivel."' where idNivel=".$_SESSION['idNivel'];
	}	
	mysql_query($sql);
	header('location:adm_usuarios.php?nome='.$nome.'');
	
	
	
	
}
?>

<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Usuários</title>
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
					<section id="section_usuario">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_cadastro">
							<div id="add_usuario">
								<?php echo($form_user);?>	
								<!--Form para selecionar os niveis-->
								
									<label>Nível:</label>
									<select name="option" class="niveis_usuarios_cadastro">
									
									
									
									<?php
									$sql = "select idNivel, nomeNivel from tblNivelUsuario";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
										
									if($rs['idNivel'] == $id_nivel_user){
										
									?>
									<option value="<?php echo($rs['idNivel']);?>" selected><?php echo($rs['nomeNivel']);?></option>

									<?php		
										
										
										
										
										
									}else{
										
									?>	
										<option value="<?php echo($rs['idNivel']);?>"><?php echo($rs['nomeNivel']);?></option>
									<?php	
										
									}		
										
										
										
									
									
									?>
									<?php
									}
									
									?>
									</select>
									<br>
									<label>Nome:</label>
									<input required name="nome" placeholder="Seu Nome" type="text" value="<?php echo($nome); ?>">
									<br>
									<label>Sobrenome:</label>
									<input required name="sobrenome" placeholder="Seu Sobrenome" type="text" value="<?php echo($sobrenome); ?>">
									<br> 
									<label>Login:</label>		
									<input required name="login" type="text" placeholder="Seu Login" value="<?php echo($login); ?>">
									<br>
									<label>Senha:</label>		
									<input required name="senha" type="text" placeholder="Sua Senha" value="<?php echo($senha); ?>">									<br>										
									
									<input required id="botao_enviar_cadastro" name="salvar" type="submit" value="<?php echo($botao);?>">
									
									 
								</form>
							</div>
							
							<div id="div_select_usuarios">
							<!--Tabela para mostrar todos os usuários-->
								<table>
											<tr>
												<h2 id="title">Todos os Usuários:</h2>
											</tr>	
												<tr>
												<td class="td_nome"><p>Nome</p></td>
												<td class="td_nome"><p>Sobrenome</p></td>
												<td class="td_nome"><p>Login</p></td>
												<td class="td_nome"><p>Nível</p></td>
												<td class="td_nome"><p>Opções</p></td>
												
												
											
											
												</tr>
											
											</tr>
											<?php
												$sql="select u.nome, u.sobrenome, u.login, u.idUsuario, n.nomeNivel, u.idNivel, n.nomeNivel from tblUsuarios as u inner join tblnivelusuario as n ON u.idNivel = n.idNivel order by u.nome;";
												$select = mysql_query($sql);
												
												while ($rs=mysql_fetch_array($select)){
													
													
													
													
													
												
											?>							
											<tr>
													<td class="td"><?php echo($rs['nome']); ?></td>
													<td class="td"><?php echo($rs['sobrenome']); ?></td>
													<td class="td"><?php echo($rs['login']); ?></td>
													<td class="td"><?php echo($rs['nomeNivel']); ?></td>
													<td class="td">
														
														<a id="img_excluir" href="adm_usuarios.php?modo=excluir&codigo=<?php echo($rs['idUsuario']); ?>&nome=<?php echo($rs['nome']); ?>" onClick="javascript: return confirm('Deseja mesmo excluir?');">
															<img src="imagens/cancel.png" title="Excluir">
														</a>
														
														<a id="img_alterar" href="adm_usuarios.php?modo=consultaeditar&codigo=<?php echo($rs['idUsuario']);?>&idNivel=<?php echo($rs['idNivel']);?>">
															<img  src="imagens/user_edit.png" title="Alterar">
														</a>
													</td>
												
												
												</tr>
											<?php 
												}
											?>
								
											
											
											
										
										
								</table>			
									
									
									
							</div>
							
							
							<div id="separar_select_do_nivel"></div>
							<div id="add_nivel">
								<form method="post" action="adm_usuarios.php" name="add_nivel">
 
									<label>Nome:</label>
									<input name="nome_nivel" placeholder="Nome nível" type="text" value="<?php echo($nome_nivel); ?>">
									<br>
									<input id="botao_enviar_cadastro" name="salvar_nivel" type="submit" value="<?php echo($botao_nivel);?>">
									
									 
								</form>
							</div>
							
							<div id="div_select_niveis">
								<?php
									$sql = "select * from tblNivelUsuario";
									$select = mysql_query($sql);									
									while($rs=mysql_fetch_array($select)){
									
								
								
								
								
								?>
							
									<div class="nome_nivel"><?php echo($rs['nomeNivel']);?></div>
									<div class="opc_niveis">
										<div class="alterar_nivel">
										<a href="adm_usuarios.php?modo=consultaeditar_nivel&idNivel=<?php echo($rs['idNivel']);?> "><img src="imagens/edit_nivel.png" class="img_nivel"/></a>
										</div>
										<div class="exlcuir_nivel">
										<a href="adm_usuarios.php?modo=excluir_nivel&idNivel=<?php echo($rs['idNivel']);?>" onClick="javascript: return confirm('Certifique-se se há usuários utilizando este nível, caso houver, este nível não será excluído');"><img src="imagens/excluir_nivel.png" class="img_nivel"/></a>
										</div>
										
										
									
									</div>
									<div class="separar_niveis"></div>
								
								<?php
								
									}
								
								?>
									
									
									
							</div>
							
								
						
						</div>
						
							
								
					
					
					
					
					</section>
					<!--Fim-->
						<footer>
							<div id="div_footer">
							<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
							<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
							</div>
						
						
						</footer>
		</body>			
			
				
		
		
	




</html>