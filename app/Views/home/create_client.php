<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $titulo; ?></title>
		<?php include("app/Views/includes/style_include.php"); ?>
	</head>
	<body>
		<main>
			<header>
				<h1>Adcionar Cliente</h1>
			</header>
			<div class="form_create"> 
				<form action="" method="post" accept-charset="utf-8">
					<div class="line">
						<label>Nome:</label>
						<input type="text" required name="nome" placeholder="Digite o nome do cliente">
					</div>
					<div class="line">
						<label>E-mail:</label>
						<input type="text" required name="email" placeholder="Digite o nome do cliente">
					</div>
					<div class="line">
						<label>Endereço:</label>
						<input type="text" required name="endereco" placeholder="Digite o nome do cliente">
					</div>
					<input type="submit" name="sand" value="Criar cliente">
				</form>
			</div>
		</main>
	</body>
</html>