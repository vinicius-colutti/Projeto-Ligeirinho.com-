<?php

include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
include_once 'conectar_banco.php';
session_start();
if($_SESSION['idNivel'] == 4){
	
	header('location:cms_home.php?nome='.$nome_sessao.'');
	
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
					<section id="section_estati">
						<div id="principal_estati">
							
						
							<div id="titulo_estati_produtos">
							Os 10 Produtos Mais Acessados da Ligeirinho.com
							
							</div>
							<?php
							$totalCliques = "";
							$sql = "select * from tblProdutos order by views desc limit 10;";	
							$select = mysql_query($sql);
							while($rs=mysql_fetch_array($select)){
								$totalCliques = $totalCliques + $rs['views'];
							
	
							?>	
							
								
							<?php
							}
							
							?>
							<?php
							$sql = "select * from tblProdutos order by views desc limit 10;";	
							$select = mysql_query($sql);
							while($rs=mysql_fetch_array($select)){
							$clique = $rs['views'];

							$totalCliques_result = $clique / $totalCliques * 100;	
							
	
							?>		
							
							
							<div class="estatic_div">
							<p class="nome_produto_static"><?php echo($rs['nomeProduto']);?></p>	
							<div class="static_bar" style="width:<?php echo($totalCliques_result);?>%;">
							<p class="h2_porcento_produto"><?php echo(number_format($totalCliques_result,2,'.',','));?>%</p>
							
							</div>
							<p class="n_acessos"><?php echo($rs['views']);?> Acessos...</p>
							
							</div>
							
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