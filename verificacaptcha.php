<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Verificando Captcha</title>
</head>

<body>
  <?php
  include_once 'conexao_ok.php';
  $resposta = "";
  include_once 'conectar_banco.php';
  include_once 'conexao_ok.php';
  $captcha_data = "";
  //Verificando TODOS os campos do formulário de usuários
	if (isset($_POST['nome'])) {
		$nome = $_POST['nome'];
	}
	
	if (isset($_POST['sobrenome'])) {
		$mensagem = $_POST['sobrenome'];
	}
	
	if (isset($_POST['login'])) {
		$mensagem = $_POST['senha'];
	}
	
	
	
	//$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=SUA-CHAVE-SECRETA&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
	
		$nome=$_POST['nome'];
		if(strstr($nome, " ")){
		 ?>
			<script>
			
			alert("O campo 'Nome' não pode ter espaços");
			
			
			</script>
			
		 <?php
		 	echo "<meta http-equiv='refresh' content='1;URL=adm_usuarios.php'>"; 
			echo "Redirect...";
		}else{
			$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdEVx8UAAAAAMISfovlPEGlapRP42wvGPq3ewBy&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
			
		
		$sobrenome=$_POST['sobrenome'];
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$id_nivel=$_POST['option'];	
		
		if ($_POST['salvar'] == 'Gravar Dados')
		{	
			$sql="insert into tblUsuarios (nome, sobrenome, login, senha, idNivel)values('".$nome."', '".$sobrenome."', '".$login."', '".$senha."', '".$id_nivel."')";
		}elseif($_POST['salvar']=='Alterar')
		{
				
				
				$sql="update tblUsuarios set nome='".$nome."',sobrenome='".$sobrenome."',login='".$login."',senha='".$senha."', idNivel='".$id_nivel."' where idUsuario=".$_SESSION['idAlterar'];
		}
			
		mysql_query($sql) or die(mysql_error());	
		//COMANDO PARA REDIRENCIONAR PARA UMA PAGINA
		header('location:adm_usuarios.php?nome='.$nome.'');
		
		}
		
		
 

?>

</body>
</html>