<?php

include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
@session_start();
if($_SESSION['idNivel'] == 3){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
}
?>
<!DOCTYPE html>

<!--Prodotto da: Vinicius Colutti. -->
<html>
	<head>
		<title>Escolher opção de conteúdo</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Admitrar Conteúdo</title>
	
	
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
											<?php echo"<span id='txt_usuario'>Seja Bem Vindo, ".$_GET['nome']."</span>" ?>
										
										
										</div>
											<div id="div_logout">
												<a href="logout.php" id="txt_logout">Logout</a>
											
											</div>
						
					</div>
					<!--Fim -->
				
				
				</nav>
					<!--Inicio da Section-->
					<section id="section_adm_conteudo_home">
					<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<div id="principal_adm_conteudo_home">
							<a href="inserir_kits.php" title="Admiministrar Página de Kits"><div id="div_adm_kits">
								
							</div></a>
							
							
								<a href="inserir_promocoes.php" title="Admiministrar Página de Promoções"><div id="div_adm_promocoes">
									
							
								</div></a>
									<a href="inserir_historia.php" title="Admiministrar Página História da Corrida"><div id="div_adm_corrida">
										
									</div></a>
										<a href="inserir_evento_destaque.php" title="Admiministrar Página de Evento em Destaque"><div id="div_adm_evento">
											
							
										</div></a>
											<a href="inserir_noticias.php" title="Admiministrar Página de Notícias"><div id="div_adm_noticias">
												
							
											</div></a>
						
						
						</div>
					
					</section>
					<!--FIM -->
				
							<footer>
								<div id="div_footer">
								<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
								<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
								</div>
						
						
							</footer>
				
		
		</body>


</html>