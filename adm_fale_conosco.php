<?php 
$nome = "";
$telefone = "";
$email = "";
$celular = "";
$facebook = "";
$profissao = "";
$sexo = "";
$sugestoes = "";
include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';

@session_start();
if($_SESSION['idNivel'] == 4){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}

if(isset($_GET['modo'])){
	
	$modo=$_GET['modo'];
	if ($modo=='excluir'){
		
		$idForm=$_GET['idForm'];
		$sql="delete from tblFaleConosco where idForm=".$idForm;
		mysql_query($sql);
		header('location:adm_fale_conosco.php?nome='.$nome_sessao.'');
		
		
	}else if($modo=='consultaeditar'){
		
		//PEGANDO OS IDS DA URL
		$idForm=$_GET['idForm'];
		//BUSCA NO DB O REGISTRO CONFORME O CODIGO FORNECIDO
		$sql="select * from tblFaleConosco where idForm=".$idForm;
		$select = mysql_query($sql) or die(mysql_error());
		
		
		if($rsconsulta=mysql_fetch_array($select)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS			
			$nome=$rsconsulta['nome'];
			$telefone=$rsconsulta['telefone'];
			$email=$rsconsulta['email'];
			$celular=$rsconsulta['celular'];
			$facebook=$rsconsulta['facebook'];	
			$profissao=$rsconsulta['profissao'];
			$sexo=$rsconsulta['sexo'];	
			$sugestoes=$rsconsulta['sugestoes'];	
			
			
		}
		
		
		
	}
	
	
}
//###################################################################################


?>


<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Fale Conosco</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
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
					<!--FIM. -->
				
				
				</nav>
				<!--Inicio da section. -->
					<section id="section_fale_conosco">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_fale_conosco">
							
								<!--PrÉ vizu do fale conosco. -->
								<div id="nomes_fale_conosco">
									<?php
									$sql="select * from tblFaleConosco";
									$select = mysql_query($sql);
													
									while ($rs=mysql_fetch_array($select)){
								
								
									?>
										<div id="formularios_enviados">
											<label class="txt_titulo_adm_fale_conosco">Nome:</label>
											<label class="txt_resultado_adm_fale_conosco_nome"><?php echo($rs['nome']); ?></label>
											<br>
											<label class="txt_titulo_adm_fale_conosco">Email:</label>
											<label class="txt_resultado_adm_fale_conosco_email"><?php echo($rs['email']); ?></label>
											<br>
											<label class="txt_titulo_adm_fale_conosco">Profissão:</label>
											<label class="txt_resultado_adm_fale_conosco"><?php echo($rs['profissao']); ?></label>
											<br>
											<div id="div_visualizar_fale_conosco"><a href="adm_fale_conosco.php?modo=consultaeditar&idForm=<?php echo($rs['idForm']); ?>" class="a_view"><img src="imagens/view.png" class="img_view" title="Visualizar" alt="visualizar"/></a></div>
											<div id="div_excluir_fale_conosco"><a href="adm_fale_conosco.php?modo=excluir&idForm=<?php echo($rs['idForm']); ?>" class="a_view"><img src="imagens/delete.png" class="img_view" title="Deletar" alt="deletar"/></a></div>
											
										
										</div>
									<?php
									}
								
									?>
									
								
								
								</div>
							
        
        
							<div id="mostrar_tudo_fale_conosco">
								<!--MOSTRAR TUDO FALE CONOSCO -->
								<form name="frm_fale_conosco" method="post" action="">
									
									<p>

									<label >Nome</label>
									<input href="#"  type="text" name="txt_nome" value="<?php echo($nome); ?>"  class="input_user" />									
									</p>
									
									<p>
									<label >Celular</label>
									<input readonly   id="company" type="text" name="txt_celular" value="<?php echo($celular); ?>" class="input_user" />
									</p>
									
									<p>

									<label >Email</label>
									<input readonly   name="txt_email" value="<?php echo($email); ?>" class="input_user" />
									</p>
									
									<p>
									<label >Fabebook</label>
									<input readonly  type="url"  name="txt_facebook" value="<?php echo($facebook); ?>" class="input_user"   />
									</p>
									
									<p>

									<label >Telefone</label>
									<input readonly id="phone" type="text" name="txt_telefone" class="input_user" value="<?php echo($telefone); ?>" />
									</p>
									
									<p>
									<label>Profissão</label>
									<input readonly  id="Country"  name="txt_profissao" class="input_user" value="<?php echo($profissao); ?>" />
									</p>
									
									 <p>
									 <label>Sexo</label>
									<input readonly   id="Country" type="text" name="txt_profissao" class="input_user" value="<?php echo($sexo); ?>" />
										
									</p>
									
									
									<p>
									<label id="lbl_title_sugestoes">Sugestões/Críticas</label>
									</p>
									<textarea readonly name="txt_obs"  id="txt_sugestoes_adm" ><?php echo($sugestoes); ?></textarea>
									
									
								</form>
								
								
							</div>
        
        
   
						
							
															
							
							
							
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