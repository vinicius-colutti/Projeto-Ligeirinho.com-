<?php
include_once 'conectar_banco.php';


$campo = "%{$_POST['campo']}%";	

		



?>



<html>
	<head>
		<title>Sistema de Gerenciamento do Site</title>
		<link rel="stylesheet" type="text/css" href="css/style_cms.css">
	
	
	</head>
	
		<body>
			<div id="div_select_noticias">
							
							<?php
							$sql = "SELECT * FROM tblKits WHERE descricao LIKE '%$campo%'";
							$select=mysql_query($sql);
							
							while($rs=mysql_fetch_array($select)){
								
								if($rs['ativarPromocao'] == 1){
									
									$ativar = "ativar_conteudo.png";
									
									
								}else{
									
									
									$ativar = "ativar_conteudo.0.png";
									
								}
								
								
								
								
							
							
							
							?>
								
								<div id="div_descricao"><?php echo($rs['precoPromocao']);?></div>
									<div id="div_imagem"><img src="<?php echo($rs['imagemPromocao']); ?>"/></div>										
											<div id="div_opc_noticias">
												<div id="alterar_noticia"><a href="inserir_promocoes.php?modo=consultaeditar&idPromocoes=<?php echo($rs['idPromocoes']);?>&idProduto=<?php echo($rs['idProduto']);?>"><img src="imagens/edit_conteudo.png" /></a></div>
												<div id="excluir_noticia"><a href="inserir_promocoes.php?modo=excluir&idPromocoes=<?php echo($rs['idPromocoes']);?>"><img src="imagens/excluir_conteudo.png" /></a></div>
												<div id="ativar_noticia"><a href="inserir_promocoes.php?modo=ativar&idPromocoes=<?php echo($rs['idPromocoes']);?>"><img src="imagens/<?php echo($ativar); ?>" /></a></div>
												<div id="ativar_noticia"><a href="inserir_promocoes.php?modo=desativar&idPromocoes=<?php echo($rs['idPromocoes']);?>"><img src="imagens/desativar.png" /></a></div>
											</div>
											<div class="separar_conteudo_listado"></div>
							<?php
							
							}
							

							?>		
								
								
							</div>
		
		
		</body>




</html>
