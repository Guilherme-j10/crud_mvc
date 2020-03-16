<?php
	
	use app\Core\coreController;

	class home extends coreController{

		public function index(){
			$model = self::model("clientesModel");
			$info = $model::list();

			if(isset($_POST["editar"])){
				$id = $_POST["id"];

				echo "<script> location.href = 'home/edit_client/{$id}'; </script>";
			}

			if(isset($_POST["deletar"])){
				$id = $_POST["id"];

				$return = $model::delete($id);

				if($return == true){
					echo "<script> location.href = 'home'; </script>";
				}else{
					echo "<script> alert('Não foi possivel deletar o usario'); </script>";
				}
			}

			self::view("home/home", "Lista clientes", ["clientes" => $info]);
		}

		public function edit_client(){
			$url = $_GET["pagina"];
			$explode = explode("/", $url);

			$id = $explode[2];

			$model = self::model("clientesModel");
			$return = $model::load_data($id);

			if(isset($_POST["update"])){
				$nome = $_POST["nome"];
				$email = $_POST["email"];
				$endereco = $_POST["endereco"];

				$result = $model::update($id, $nome, $email, $endereco);
				
				if($result == true){
					echo "<script> alert('Cliente atualizado'); location.href = '../../home'; </script>";
				}else{
					echo "<script> alert('Erro'); </script>";
				}
			}

			self::view("home/edit_client", "Editar Cliente", ["dados_client" => $return]);
		}

		public function create_client(){
			if(isset($_POST["sand"])){
				$nome = $_POST["nome"];
				$email = $_POST["email"];
				$endereco = $_POST["endereco"];

				$insert = self::model("clientesModel");
				$result = $insert::insert($nome, $email, $endereco);

				if($result == true){
					echo "<script> alert('Cliente adcionado'); location.href = '../home'; </script>";
				}else{
					echo "<script> alert('Erro'); </script>";
				}
			}
			self::view("home/create_client", "Adcionar novo cliente", null);
		}

	}