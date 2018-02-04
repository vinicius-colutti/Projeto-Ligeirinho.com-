<?php
@include'conectar_banco.php';


	if(isset($_GET['sucesso'])){
	?>
		<script type="text/javascript">
			if(<?php echo($_GET['sucesso']) ?> == "1"){

				window.alert('Formulário enviado com sucesso, a Ligieirinho.com agradece!!');

			}


		</script>


	<?php




	}


$result_0 = "<label class='result_0'>Nenhum Resultado na busca :(</label>";
$result_1 = "<label class='result_0' style='display:none'>Nenhum Resultado na busca :(</label>";


?>





<!DOCTYPE html>

<html lang="pt">
	<head>
		<title>Ligeirinho Runs</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen and (min-width:900px) and (max-width:2000px)">
		<link rel="stylesheet" media="screen and (min-device-width:290px) and (max-device-width:480px)" href="css/style_mobile.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/mobile.js"></script>
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

			<div id="menu_parecer">


			</div>

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
								<a href="" id="esquerda"><img class="botoes" src="imagens/botao_esquerda.png"></a>
								<img alt="fundo1"  id="fundo_botoes_esquerda" src="imagens/fundo_slide.png">

							</div>
							<div>

								<a href="#" id="direita"><img class="botoes" src="imagens/botao_direita.png"></a>
								<img alt="fundo2" id="fundo_botoes_direita"src="imagens/fundo_slide.png">
							</div>

						</div>


							<div id="slide" class="slide_css">

								<img src="imagens/slide2.jpg" class="img_slide" alt="slide1" title="slider">
								<img src="imagens/slide3.jpg" class="img_slide" alt="slide2" title="slider2">
								<img src="imagens/slide4.jpg" class="img_slide" alt="slide3" title="slider3">
								<img src="imagens/slide5.jpg" class="img_slide" alt="slide4" title="slider4">
							</div>

									<div id="div_menu_vertical">
										<div id="div_pesquisar_produtos">
											<form method="get" action="index.php" name="pesquisa">

											<input id="input_pesquisar" placeholder="Pesquisar Produtos..." name="textos_pesquisa" type="text">
											<button type="submit" id="btn_pesquisa" name="btn_pesquisa">OK</button>

											</form>
										</div>

										<div id="div_todos_produtos">

											<a href="index.php" class="link_all_produtos">Todos os Produtos</a>

										</div>
										<nav class="navigation">
										<?php
											$sql = "select * from tblCategoria";
											$select = mysql_query($sql);

											while($rs=mysql_fetch_array($select)){
												$idCategoria_sub = $rs['idCategoria'];



										?>
										<ul class="mainmenu">

											<li><a href="#"><?php echo($rs['nomeCategoria']);?></a>
											<ul class="submenu">
												<?php
													$sql_sub = "select * from tblSubCategoria where idCategoria =".$idCategoria_sub;
													$select_sub_categoria = mysql_query($sql_sub);

												while($rs_sub_categoria=mysql_fetch_array($select_sub_categoria)){



												?>

													<li><a href="index.php?modo=consulta&idSubCategoria=<?php echo($rs_sub_categoria['idSubCategoria']); ?>"><?php echo($rs_sub_categoria['nomeSubCategoria']); ?></a></li>
												<?php
												}
												?>


										</ul>

											</li>

										</ul>

										<?php
										}
										?>




										</nav>
									</div>
									<div>
										<div id="facebook">


										</div>

										<div id="snapchat">


										</div>
										<div id="instagram">


										</div>




									</div>


									<div id="div_de_produtos">
									<?php
									if(isset($_GET['modo']) == 'consulta'){

										$modo=$_GET['modo'];
										$idSubCategoria=$_GET['idSubCategoria'];
										$sql = "select p.imagem, p.nomeProduto, p.descricaoProduto, p.valorProduto, p.idSubCategoria, p.idProduto from tblprodutos as p inner join tblsubcategoria as cs on p.idSubCategoria = cs.idSubCategoria where ativado = 1 and cs.idSubCategoria =".$idSubCategoria;

									}elseif(isset($_GET['btn_pesquisa'])){

										$texto = $_GET['textos_pesquisa'];
										$sql="select * from tblprodutos where ((nomeProduto LIKE'$texto%') or (descricaoProduto like '$texto%'));";



									}else{

										$sql = "select * from tblprodutos where idProduto > 0 and ativado = 1 order by rand();";


									}


									$select = mysql_query($sql) or die (mysql_error());

									while($rs=mysql_fetch_array($select)){






									?>

										<div id="produto_01">
										<div class="animation_produtos">
													<label class="txt_label_index">Nome:</label>
												 <label class="txt_result_nome"><?php echo($rs['nomeProduto']);?></label>

												 <br>
												<label  class="txt_label_index">Descrição:</label>
												<label class="txt_result_descricao" maxlength="10"><?php echo($rs['descricaoProduto']);?></label>
												<br>
												<label class="txt_label_index">Valor:</label>
												<label class="txt_result_valor">R$<?php echo($rs['valorProduto']);?></label>
												<br>
												<a href="verifica_clique.php?idProduto=<?php echo($rs['idProduto']); ?>" class="tag_a">Detalhes</a>

										</div>
											<img src="<?php echo($rs['imagem']);?>" class="img_produtos" alt="produto" title="produto">
											 <label class="txt_nome"><?php echo($rs['nomeProduto']);?></label>


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
