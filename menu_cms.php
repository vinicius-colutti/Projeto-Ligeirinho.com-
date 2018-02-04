<?php
include_once 'conexao_ok.php';
$nome_sessao = $_SESSION['nome'];
$idUsuario = $_SESSION['idUsuario'];
$idNivel_sessao = $_SESSION['idNivel'];

$div_principal_conteudo = "<div id='div_principal_conteudo'>";
$div_principal_fale_conosco = "<div id='div_principal_fale_conosco'>";
$div_principal_produtos = "<div id='div_principal_produtos'>";
$div_principal_usuario = "<div id='div_principal_usuario'>";
$div_principal_conteudo_bloq = "<div id='div_principal_conteudo' style='display:none;'>";
$div_principal_produtos_bloq = "<div id='div_principal_produtos' style='display:none;'>";
$div_principal_fale_conosco_bloq = "<div id='div_principal_fale_conosco' style='display:none;'>";
$div_principal_usuario_bloq = "<div id='div_principal_usuario' style='display:none;'>";




if($idNivel_sessao == 1){
	$div_principal_conteudo = "<div id='div_principal_conteudo'>";
	$div_principal_fale_conosco = "<div id='div_principal_fale_conosco'>";
	$div_principal_produtos = "<div id='div_principal_produtos'>";
	$div_principal_usuario = "<div id='div_principal_usuario'>";

	
	
}

if($idNivel_sessao == 3){
	
	$div_principal_produtos = "<div id='div_principal_produtos'>";
	$div_principal_fale_conosco_bloq = "<div id='div_principal_fale_conosco' style='display:block; opacity:0.5;'>";
	$div_principal_usuario_bloq = "<div id='div_principal_usuario' style='display:block; opacity:0.5;'>";
	$div_principal_conteudo_bloq = "<div id='div_principal_conteudo' style='display:block; opacity:0.5;'>";
	$div_principal_conteudo = "<div id='div_principal_conteudo' style='display:none;'>";
	$div_principal_fale_conosco = "<div id='div_principal_fale_conosco' style='display:none;'>";
	$div_principal_usuario = "<div id='div_principal_usuario' style='display:none;'>";
	
}
if($idNivel_sessao == 4){
	
	$div_principal_conteudo = "<div id='div_principal_conteudo'>";
	$div_principal_fale_conosco_bloq = "<div id='div_principal_fale_conosco' style='display:block; opacity:0.5;'>";
	$div_principal_usuario_bloq = "<div id='div_principal_usuario' style='display:block; opacity:0.5;'>";
	$div_principal_produtos_bloq = "<div id='div_principal_produtos' style='display:block; opacity:0.5;'>";
	$div_principal_fale_conosco = "<div id='div_principal_fale_conosco' style='display:none;'>";
	$div_principal_usuario = "<div id='div_principal_usuario' style='display:none;'>";
	$div_principal_produtos = "<div id='div_principal_produtos' style='display:none;'>";
	
	
}

?>
						<?php echo($div_principal_conteudo);?>
							<a href="adm_conteudo_home.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="img_adm_conteudo">
							</div></a>
							<a href="adm_conteudo_home.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="txt_adm_conteudo">
								<p>Adm.Conteúdo</p>
							</div></a>
						
						
						</div>
						<?php echo($div_principal_conteudo_bloq);?>
							<a  class="links_do_cms"><div id="img_adm_conteudo">
							</div></a>
							<a  class="links_do_cms"><div id="txt_adm_conteudo">
								<p>Adm.Conteúdo</p>
							</div></a>
						
						
						</div>
							<?php echo($div_principal_fale_conosco);?>
								<a href="adm_fale_conosco.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="img_adm_fale_conosco">
								</div></a>
								<div id="txt_adm_fale_conosco">
									<a href="adm_fale_conosco.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><p>Adm.Fale Conosco</p></a>
								</div>						
							
							</div>
							<?php echo($div_principal_fale_conosco_bloq);?>
								<a class="links_do_cms"><div id="img_adm_fale_conosco">
								</div></a>
								<div id="txt_adm_fale_conosco">
									<a  class="links_do_cms"><p>Adm.Fale Conosco</p></a>
								</div>						
							
							</div>
								<?php echo($div_principal_produtos);?>
									<a href="adm_produtos_home.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="img_adm_produtos">
									</div></a>
									<a href="adm_produtos_home.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="txt_adm_produtos">
										<p>Adm.Produtos</p>
									</div></a>
								
								</div>
								<?php echo($div_principal_produtos_bloq);?>
									<div id="img_adm_produtos">
									</div>
									<div id="txt_adm_produtos">
										<p>Adm.Produtos</p>
									</div>
								
								</div>
								
								
									<?php echo($div_principal_usuario);?>
										<a href="adm_usuarios.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><div id="img_adm_usuario">
										</div></a>
										<div id="txt_adm_usuario">
											<a href="adm_usuarios.php?nome=<?php echo($nome_sessao);?>" class="links_do_cms"><p>Adm.Usuários</p></a>
										</div>
									
									</div>
									<?php echo($div_principal_usuario_bloq);?>
										<a  class="links_do_cms"><div id="img_adm_usuario">
										</div></a>
										<div id="txt_adm_usuario">
											<a  class="links_do_cms"><p>Adm.Usuários</p></a>
										</div>
									
									</div>



