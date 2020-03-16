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
				<h1>Lista Clientes</h1>
				<div class="actions">
					<a href="home/create_client">Adicionar Cliente</a>
				</div>
			</header>
			<table>
				<tr>
					<th>ID</th>
					<th>NOME</th>
					<th>E-MAIL</th>
					<th>ENDERECO</th>
					<th>ACTIONS </th>
				</tr>
				<?php 
					if($dados["clientes"] != null):
						foreach ($dados["clientes"] as $key): 
				?>
							<tr>
								<td><?= $key["id_cliente"] ?></td>
								<td><?= $key["nome_cliente"] ?></td>
								<td><?= $key["email_cliente"] ?></td>
								<td><?= $key["endereco_cliente"] ?></td>
								<td>
									<form action="" method="post" accept-charset="utf-8">
										<input type="hidden" name="id" value="<?= $key["id_cliente"] ?>">
										<button type="submit" name="editar"><i class="far fa-edit"></i></button>
										<button type="submit" name="deletar"><i class="fas fa-trash-alt"></i></button>
									</form>
								</td>
							</tr>
				<?php 	endforeach;
					else:
				?>
						<tr>
							<td>- -</td>
							<td>- -</td>
							<td>- -</td>
							<td>- -</td>
							<td>- -</td>
						</tr>
				<?php endif; ?>
			</table>
		</main>
	</body>
</html>