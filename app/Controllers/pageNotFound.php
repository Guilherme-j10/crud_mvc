<?php
	
	use app\Core\coreController;

	class pageNotFound extends coreController{

		public function pagenot(){
			$this->view("home/pagenotfound", "pagina nao encontrada", null);
		}

	}