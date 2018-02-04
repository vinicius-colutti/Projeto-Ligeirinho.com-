<?php  
include_once 'conexao_ok.php';
$nome = $_GET['nome'];
$nome_sessao = $_SESSION['nome'];
$idUsuario = $_SESSION['idUsuario'];
$idNivel_sessao = $_SESSION['idNivel'];

?>

<!DOCTYPE html>
<!--Prodotto da: Vinicius Colutti. -->
<html lang="pt">
	
	<head>
		<title>Sistema de Gerenciamento do Site</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">				

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
		
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One|Bungee|Francois+One|Libre+Franklin|Patua+One|Ranga|Ropa+Sans|Sarala|Squada+One" rel="stylesheet">
		<meta charset="utf-8">
	
	</head>
	
		<body>
		<script src="js/highcharts.js"></script>
		<script src="js/data.js"></script>
		<script src="js/drilldown.js"></script>
		
			
		
		
		
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
					<!-- principal div da nav-->
					<div id="principal_nav">
						<?php include 'menu_cms.php'; ?>
										<div id="div_txt_usuario">
											<?php echo"<span id='txt_usuario'>Seja Bem Vindo, ".$_SESSION['nome']."</span>" ?>
										
										
										</div>
										<!-- botão logout-->
											<div id="div_logout">
												<a href="logout.php" id="txt_logout">Logout</a>
											
											</div>
						
					</div>
					<!--fim da div da nav -->
				
				
				</nav>
					<!-- inicio da section-->
					<section id="section_home">
						<div id="server_status"><span id="txt_sts">Status do Servidor:</span><span id="txt_online"> Online</span></div>
						<!-- DIV CONTAINER PARA SERVIR DE BASE PARA O SCRIPT DE GRÁFICOS-->
						<div id="container"> </div>
						<?php
						//INCLUDE DO SCRIPT
						include_once 'grafico_cms.php';

						?>	

					
					</section>
						<footer>
							<div id="div_footer">
							<center id="span_footer">Sviluppato da: Vinicius Colutti.</center>
							<center id="span_footer_bmnv">BMNV - Soluctions</center>
							
							</div>
						
						
						</footer>
		</body>			
			
				
		
		
	




</html>