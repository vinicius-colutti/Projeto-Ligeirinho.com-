
<?php 
		// session_start inicia a sessão
		@session_start();
		// as variáveis login e senha recebem os dados digitados na página anterior
		$login = $_POST['login'];		
		$senha = $_POST['senha'];
		// as próximas 2 linhas são responsáveis em se conectar com o bando de dados.
		$con = mysql_connect("localhost", "root", "bcd127") or die ("Sem conexão com o servidor");
		$select = mysql_select_db("dbProjeto") or die("Sem acesso ao DB, Entre em contato com o Administrador");

		// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
		$result = mysql_query("SELECT * FROM `tblUsuarios` WHERE `login` = '$login' AND `senha`= '$senha'");

		if(mysql_num_rows ($result) > 0 )
		{
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;		
		if($rsconsulta=mysql_fetch_array($result)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS		
			$nome=$rsconsulta['nome'];
			$idNivel=$rsconsulta['idNivel'];				
			$idUsuario=$rsconsulta['idUsuario'];
			$_SESSION['nome'] = $nome;	
			$_SESSION['idUsuario'] = $idUsuario;
			$_SESSION['idNivel'] = $idNivel;	
			header('location:redirect.php?idNivel='.$idNivel.'');
			
		}
		
		
		}
		else{
			?>
				<script>
				
				window.alert('Usuário ou senha incorretos(a)!');
				header('location:index.php');
				
				</script>
				
			<?php
			//FAZ UM REFRESH NA PAG
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>"; 
			echo "Redirect...";
			
			}
			
?>






