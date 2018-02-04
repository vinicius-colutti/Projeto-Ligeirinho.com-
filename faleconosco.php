<?php
@include_once 'conectar_banco.php';


//###################################################################################
if(isset($_POST['salvar'])){
	//RESGATA OS VALORES DIGITADOS PELO USUÁRIO
	$nome=$_POST['txt_nome'];
	$telefone=$_POST['txt_telefone'];
	$celular=$_POST['txt_celular'];
	$email=$_POST['txt_email'];
	$facebook=$_POST['txt_facebook'];	
	$sexo=$_POST['rd_sexo'];
	$profissao=$_POST['txt_profissao'];	
	$obs=$_POST['txt_obs'];	
	
	$sql="insert into tblfaleConosco (nome, telefone, celular, email, facebook, sugestoes, profissao, sexo)values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$facebook."', '".$obs."', '".$profissao."', '".$sexo."')";
	
	
	mysql_query($sql);	
	//COMANDO PARA REDIRENCIONAR PARA UMA PAGINA
	
	header('location:index.php?sucesso=1');
	
	
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fale Conosco</title>
		<link rel="stylesheet" type="text/css" href="css/style_fale_conosco.css" media="screen and (min-width:900px) and (max-width:2000px)">
		<link rel="stylesheet" media="screen and (min-device-width:290px) and (max-device-width:480px)" href="css/style_mobile.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
		<meta charset="utf-8">
			
			<script type="text/javascript">
				function SomenteNumero(e){
					var tecla=(window.event)?event.keyCode:e.which;   
					if((tecla>47 && tecla<58)) return true;
					else{
						if (tecla==8 || tecla==0) return true + mascaraTelefone;
					else  return false;
					}
				}	
				
				
				
				
				function mascaraTelefone( campo, caracter )
				{
					if(window.event){
						
						
						var tecla=caracter.keyCode;
						
					}
					
					
					
					else if(caracter.which){
						
						var tecla=caracter.which;
						
						
					}
					var telefone = campo.value;
					
					if( tecla!=8 && tecla!=46 )
					{
						if( telefone.length==0 )
						{
							campo.value = telefone += '(';
						}
						else if( telefone.length==3 )
						{
							campo.value = telefone += ') ';
						}else if(telefone.length==9){
							
							
							campo.value = telefone += '-';
							
						}
						
							campo.value = telefone;
					}
				}
				
				
				function mascaraCelular(c, caracter){
					
					if(window.event){
						
						
						var tecla=caracter.keyCode;
						
					}
					
					
					
					else if(caracter.which){
						
						var tecla=caracter.which;
						
						
					}
					
					
					if(tecla != 8 && tecla!=127){
						
						if(c.value.length == 1){
							
							c.value = "("+c.value;
							
						}else if(c.value.length == 3){
							
							c.value += ") ";
							
						}else if(c.value.length == 10){
							
							c.value +="-";
							
							
						}
						
						
						
					}
					
					
					
				}
			
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
				
				
					<div id="logo_fale">
						
						
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
		<section>	
			<div class="accordions">
	 
				  <div class="accordion-item">
					  <input type="checkbox" name="accordion" checked="checked" id="accordion-1" />
					  <label for= "accordion-1">O que é fale conosco?</label>
					  <div class="accordion-content">O fale conosoco, é uma área destinada aos usuários, para que vocês possam enviar sua opniões, críticas ou sugestões sobre um determinado evento, ou até mesmo de nosso site; Dicas de layout, informar bugs ou erros, dúvidas, anunciar etc.</div>
				  </div>
		 
				  <div class="accordion-item">
					  <input type="checkbox" name="accordion" id="accordion-2" />
					  <label for= "accordion-2">Qual a importânca?</label>
					  <div class="accordion-content">O atendimento ao cliente é, sem dúvidas, um dos principais influenciadores na satisfação e fidelização da Ligeirinho. Por isso, nós investimos em múltiplos canais — principalmente nas redes sociais e no atendimento online.</div>
				  </div>
		 
				  <div class="accordion-item">
					  <input type="checkbox" name="accordion" id="accordion-3" />
					  <label for= "accordion-3">Como entrar em contato?</label>
					  <div class="accordion-content">preencha todos os dados abaixo para entrar em atendimento, os campos com * são obrigatórios. Certifique-se se os dados estão corretos, e clique no botão ENVIAR. Caso seja enviado informações incorretas, basta enviar novamente. </div>
				  </div>
			</div>	
				
				<div id="div_principal_fale_conosco">
					
					
					<div id="signup-inner">
						
						<form name="frm_fale_conosco" method="post" action="faleconosco.php">
							
							<p>

							<label >Nome *</label>
							<input  required pattern="[a-z A-Z ã Ã ô Ô ]*" placeholder="Digite seu Nome" type="text" name="txt_nome" value="" class="input" />
							</p>
							
							<p>
							<label >Celular *</label>
							<input required="required" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" placeholder="(99)99999-9999" maxlength="15" onkeypress="mascaraCelular(this, event)" id="company" type="text" name="txt_celular" value="" class="input" />
							</p>
							
							<p>

							<label >Email *</label>
							<input  type="email"  placeholder="nome@email" name="txt_email" value="" class="input" />
							</p>
							
							<p>
							<label >Fabebook</label>
							<input  type="url"  name="txt_facebook" class="input" placeholder="http://facebook.com/usuario"  />
							</p>
							
							<p>

							<label >Telefone</label>
							<input  required="required" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" placeholder="(99)9999-9999"  maxlength="14" onkeypress="mascaraTelefone(this, event )" id="phone" type="text" name="txt_telefone" class="input" value="" />
							</p>
							
							<p>
							<label>Profissão *</label>
							<input placeholder="Digite sua profissão" required pattern="[a-z A-Z ã Ã ô Ô ]*" id="Country" type="text" name="txt_profissao" class="input" value="" />
							</p>
							
							 <p>
								<h2 class="h2_sexo"><input class="rd_sexo" type="radio" name="rd_sexo" value="M" checked>Masculino
								<input class="rd_sexo" type="radio" name="rd_sexo" value="F" >Feminino</h2>
							</p>
							
							
							<p>
							<label>Sugestões/Críticas</label>
							<textarea name="txt_obs"  cols="30" rows="10"></textarea>

							</p>
							
							<p>

							<button id="botao_salvar" name="salvar" type="submit">Enviar</button>
							</p>
							
						</form>
						
					</div>
					
					
				</div>
				
		</section>	
			  
				
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