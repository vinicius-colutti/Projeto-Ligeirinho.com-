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
		<script type="text/javascript" src="jquery.mlens-1.6.min.js"></script>
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
					
					$(document).ready(function(){
						var zoom_img = $('.zoom_img');
						
						zoom_img.mlens({
							
							imgSrc: $("#kit1").attr("data-big"),
							
							
							
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
			
			
			<div id="caixa_kit">
					<section id="section_kit">
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
						
						<div id="principal_dos_kits">
							<?php
								$sql = "select * from tblKits where ativarKit = 1";
								
								$select = mysql_query($sql);
								
								while($rs=mysql_fetch_array($select)){
									
									
								
								
							
							
							?>
							
								<div id="kit1" class="zoom_img">
								<img src="<?php echo($rs['imagemKit']);?>">
									<div id="legenda_kit1">
									<p><?php echo($rs['descricao']);?></p>
									<a href="#">Saiba mais</a>
									</div>
								
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