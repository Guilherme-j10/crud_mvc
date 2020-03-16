<?php
	
	namespace app\Models;
	use app\Models\database;

	class clientesModel{

		public function list(){
			$pdo = database::connection();

			$stmt = $pdo->prepare("SELECT * FROM clientes");
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}

		public function insert($nome, $email, $endereco){
			$pdo = database::connection();

			$stmt = $pdo->prepare("INSERT INTO clientes (nome_cliente, email_cliente, endereco_cliente) VALUES (:nome, :email, :end)");
			$stmt->execute([":nome" => $nome, ":email" => $email, ":end" => $endereco]);

			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function load_data($id){
			$pdo = database::connection();

			$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
			$stmt->execute([":id" => $id]);

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}
		
		public function update($id, $nome, $email, $endereco){
			$pdo = database::connection();

			$stmt = $pdo->prepare("UPDATE clientes SET nome_cliente = :nome, email_cliente = :email, endereco_cliente = :end WHERE id_cliente = :id");
			$stmt->execute([":id" => $id, ":nome" => $nome, ":email" => $email, ":end" => $endereco]);

			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function delete($id){
			$pdo = database::connection();

			$stmt = $pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id");
			$stmt->execute([":id" => $id]);

			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}