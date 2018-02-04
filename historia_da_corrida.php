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
							speed:3000,
							timeout:4000,
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
					<div id="div_principal_botao">			
						<div class="divs_botao">
							<a href="#" id="esquerda"><img  class="botoes"src="imagens/botao_esquerda.png"></a>
							<img  id="fundo_botoes_esquerda"src="imagens/fundo_slide.png">
						
						</div>
						<div>
					
							<a href="#" id="direita"><img class="botoes" src="imagens/botao_direita.png"></a>
							<img  id="fundo_botoes_direita"src="imagens/fundo_slide.png">
						</div>	
						
					</div>
						
					
						<div id="slide" class="slide_css">
							
							<img src="imagens/slide2.jpg" class="img_slide">
							<img src="imagens/slide3.jpg" class="img_slide">
							<img src="imagens/slide4.jpg" class="img_slide">
							<img src="imagens/slide5.jpg" class="img_slide">
						</div>
						
							<div id="principal_historia">
								<?php
								$sql = "select * from tblCorridaHistoria where ativarHistoria = 1";
								$select = mysql_query($sql);
								
								while($rs=mysql_fetch_array($select)){
									
									
									
								
								
								
								?>
							
							
								<div id="imagem1_historia">
									<ul class="demo-2 effect">
										<li>
										   <h2 class="zero"><?php echo($rs['descricaoImagem1']);?></h2>
										   <p class="zero"></p>
										</li>
										<li><img class="top" src="<?php echo($rs['imagem1']);?>" alt=""/></li>
									</ul>
								
								
								
								</div>
									<div id="texto1_historia">
										<p><?php echo($rs['texto1']);?> </p>	
									
									</div>
										<div id="imagem2_historia">
											<ul class="demo-3">
												<li>
													<figure>
														<img src="imagens/imagem2_historia.png" alt=""/>
														<figcaption>
															
															<p><?php echo($rs['texto2']);?></p>
														</figcaption>
													</figure>
												</li>
											</ul>
										
										
										</div>
											<div id="imagem3_historia">
												<ul class="demo-2 effect">
													<li>
													   <h2 class="zero"><?php echo($rs['descricaoImagem2']);?></h2>
													   <p class="zero"></p>
													</li>
													<li><img class="top" src="<?php echo($rs['imagem2']);?>" alt=""/></li>
												</ul>
											
											
											</div>
												<div id="texto2_historia">
												<p><?php echo($rs['texto3']);?></p>
												
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
										<div id="soci_3">
										</div>
											<div id="soci_4">
											</div>
								
								</div>
							
							</div>
						
						
						
						</footer>
			
		
		
		
		
		</body>
	






	


</html>