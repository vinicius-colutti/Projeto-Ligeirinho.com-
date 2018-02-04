<?php
@include'conectar_banco.php';

	
?>





<!DOCTYPE html>

<html lang="pt">
	<head>
		<title>Ligeirinho Runs</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen and (min-width:900px) and (max-width:2000px)">
		<link rel="stylesheet" media="screen and (min-device-width:290px) and (max-device-width:480px)" href="css/style_mobile.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>		
		<meta charset="utf-8">
		
		<script type="text/javascript">
				
					$(document).ready(function(){
						$('#slide').cycle({ 
							fx:'fade',
							speed:3000,
							timeout:4000,
							prev:'#esquerda',
							next:'#direita',
						});
					});
				
				
				
				
				
			</script>
			
	</head>
	
		<body>
	
			<header>
			
			
			<div id="div_principal_header">
			<nav id="nav_menu_mobile">
			 
			  <ul class="menu">				
				<li>			  
				  <img src="imagens/drop_icon.png" id="drop_icon"/>			 
				  <ul id="ul_menu_mobile">
					<li class="txt_menu_mobile"><a class="txt_menu_mobile" href="index.php">Home</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="kits.php">Kits Eventos</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="promocoes.php">Promoções</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="historia_da_corrida.php">Corrida de Rua</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="evento_destaque.php">Evento em Destaque</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="esportes.php">Notícias</a></li>
					<li class="txt_menu_mobile"><a class="txt_menu_mobile"  href="faleconosco.php">Fale Conosco</a></li>
				  </ul>
				</li>
			  </ul>		
			</nav>
				<div id="logo">
					
					
				</div>
				<div id="menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="kits.php">Kits Eventos</a></li>
						<li><a href="promocoes.php">Promoções</a></li>
						<li><a href="historia_da_corrida.php">Corrida de Rua</a></li>
						<li><a href="evento_destaque.php">Evento em Destaque</a></li>
						<li><a href="faleconosco.php">Fale Conosco</a></li>
						<li><a href="esportes.php">Notícias</a></li>						
					</ul>
				</div>
						<form name="cms_pag" method="post" action="login.php">	
							<div id="div_login">
								<input required value=""  placeholder="Usuário" class="input_campos"  name="login" >
								
								<input required value=""  placeholder="Senha"  class="input_campos" type="password" name="senha" >
								
								<button type="submit" id="botao_ok" name="logar">Ok</button>
							
							</div>
						</form>	
			</div>			
			
			
			</header>
			
			
			<div id="caixa">
					<section id="section_view_produto">
						<div class="principal_view_produtos">
						<?php
						$idProduto = $_GET['idProduto'];
						
						$sql="select * from tblProdutos where idProduto=".$idProduto;
						
						$select = mysql_query($sql);
						
						while($rs=mysql_fetch_array($select)){
							
							
						
						
						?>
							<div class="foto_produto">
							
							<img src="<?php echo($rs['imagem']); ?>" />
							
							</div>
							
								<div class="descricao_produto">
								<p class="descricao_produto_txt"><?php echo($rs['descricaoProduto']); ?></p>
								
								</div>
								
								<div class="valor_produto">
									
								<p class="valor_produto_txt">R$<?php echo($rs['valorProduto']); ?></p>
								</div>
									<div class="nome_produto">
									<p class="nome_produto_txt"><?php echo($rs['nomeProduto']); ?></p>
								
									</div>
									
						<?php

						}
						?>	
										
							
						
						
						</div>	
									
								
								
					
					
					</section>
					
					
						
			</div>
						<footer id="footer">
							<div id="div_principal_footer">
								<div id="rd_sociais_mobile">
								<div id="soci_1">
								</div>
									<div id="soci_2">
									</div>	
								
								</div>
							
							</div>
						
						
						
						</footer>
			
		
		
		
		
		</body>
	






	


</html>