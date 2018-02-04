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
						<li><a href="">Evento em Destaque</a></li>
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
						<div id="principal_esportes">
							<?php
							$sql="select * from tblNoticias where ativarNoticia = 1";
							$select = mysql_query($sql);
										
							while ($rs=mysql_fetch_array($select)){
							
							
							?>
						
								<div id="div1_esporte">
									<div id="div_img"><img src="<?php echo($rs['imagemNoticia']);?>"></div>
								
									<div id="legenda_noticia">
									
										<p><?php echo($rs['descricao']);?></p>
										
									
									</div>	
								
								
								</div>
							
							<?php
							}
							
							?>
							
							
							
															
																<div id="slide" class="slide_css_esporte">	
																	<?php
																		$sql="select imagemNoticia from tblnoticias where ativarNoticia = 1;";
																		$select = mysql_query($sql);
										
																		while ($rs=mysql_fetch_array($select)){
																	?>			
																				<img src="<?php echo($rs['imagemNoticia']);?>" class="img_slide_esporte" alt="slide1" title="slider">	
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