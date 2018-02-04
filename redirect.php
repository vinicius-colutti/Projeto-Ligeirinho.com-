<?php

$idNivel_sessao = $_GET['idNivel'];


?>
<!DOCTYPE html>
<html>
	<head>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style_cms.css">
	<!-- SCRIPT PARA TROCAR OS TEXTOS, E MANDAR PARA A OUTRA PAG-->
		<script>
			function logar(){
		
				setTimeout(function(){window.top.location="cms_home.php?nome=<?php echo($idNivel_sessao);?>"}, 21000);
			}
			$(document).ready(function(){
    var textos = ["Absorvendo Informações de rede.", "Estabelecendo Conexão com o servidor.", "Verificando Login e Senha, aguarde..."];
    var atual = 0;
    $('#frases').text(textos[atual++]);
    setInterval(function() {
        $('#frases').fadeOut(function() {
            if (atual >= textos.length) atual = 0;
            $('#frases').text(textos[atual++]).fadeIn();
        });
    }, 7000);
});
		</script>
	
	
	
	</head>
	
	
		<body>
		
			<?php
				//chamando a função
				echo"<script>logar()</script>";
			
			?>
			<!--div do redirect -->
			<div id="principal_redirect">
				<center id="frases" class="center_redirect"></center>
				
				<div id="div_gif_redirect">
					<img src="imagens/carregamento.gif"/>
				</div>
			</div>
		
		
		
		</body>




</html>