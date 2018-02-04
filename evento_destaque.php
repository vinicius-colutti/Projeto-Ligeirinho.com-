<?php
@include_once 'conectar_banco.php';



?>


<!DOCTYPE html>

<html>
	<head>
		<title>Ligeirinho Runs</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen and (min-width:900px) and (max-width:2000px)">
		<link rel="stylesheet" media="screen and (min-device-width:290px) and (max-device-width:480px)" href="css/style_mobile.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
		<meta charset="utf-8">
		
		<script text="text/javascript">
				
					$(document).ready(function(){
						$('#slide').cycle({ 
							fx:'fade',
							speed:400,
							timeout:1000,
							prev:'#esquerda',
							next:'#direita',
						});
					});
				
				
				
				
				
			</script>
			
	</head>
	
		<body>
		<div id="main-nav" class="stellarnav">
			<ul>
				<li><a href="index.php">Home</a>		    	
				</li>
				<li><a href="promocoes.php">Promoções</a></li>
				<li><a href="esportes.php">Notícias</a></li>
				<li><a href="historia_da_corrida.php">Corrida de Rua</a></li>
				<li><a href="evento_destaque.php">Evento Destaque</a></li>
				<li><a href="kits.php">Kists Eventos</a></li>
				<li class="drop-left"><a href="faleconosco.php">Fale Conosco</a>		    	
				</li>
			</ul>
		</div><!-- .stellar-nav -->
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script type="text/javascript" src="js/stellarnav.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery('.stellarnav').stellarNav({
					theme: 'light'
				});
			});
		</script>
		<header>
			
			
			<div id="div_principal_header">
			
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
					<section>
						<div id="principal_evento_destaque">
							<?php
								$sql = "select e.imagem, e.texto, e.img_slider1, e.img_slider2, e.img_slider3, e.img_slider4, e.img_slider5,
										p.descricaoProduto FROM tbleventodestaque as e INNER JOIN tblprodutos as p ON e.idProduto = p.idProduto and e.ativarDestaque = 1;";
								
								$select = mysql_query($sql);

								while($rs=mysql_fetch_array($select)){
									
									
										
							
							?>
						
								<div id="imagem_evento_destaque">
									<img src="<?php echo($rs['imagem']);?>">
									
								</div>
								<div class="descricao_do_produto_destaque"><p class="descricao_do_produto_destaque_texto"><?php echo($rs['descricaoProduto']);?></p></div>
						
								<div id="texto_evento_destaque">
									<p class="teste_p" maxlength="400"><?php echo($rs['texto']);?></p>
								
						
						
								</div>
							<?php
								}
							?>
					
					
						
					
							<div id="slide" class="slide_css">
								<?php
									$sql = "select img_slider1, img_slider2, img_slider3, img_slider4, img_slider5 from tbleventodestaque where ativarDestaque = 1";
									$select = mysql_query($sql);
									while($rs=mysql_fetch_array($select)){
										
									
								?>
									<img src="<?php echo($rs['img_slider1']);?>" class="img_slide">
									<img src="<?php echo($rs['img_slider2']);?>" class="img_slide">
									<img src="<?php echo($rs['img_slider3']);?>" class="img_slide">
									<img src="<?php echo($rs['img_slider4']);?>" class="img_slide">
									<img src="<?php echo($rs['img_slider5']);?>" class="img_slide">
								<?php
									}
								?>
							</div>
						
						
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
										<div id="soci_3">
										</div>
											<div id="soci_4">
											</div>
								
								</div>
							
							</div>
						
						
						
						</footer>
			
		
		
		
		
		</body>
	






	


</html>