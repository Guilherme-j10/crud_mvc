<?php
	
	namespace app\Core;

	class app {

		protected $controller = "home";
		protected $method = "index";
		protected $param = [];
		protected $pageNotFound = false;

		public function __construct(){
			$url = isset($_GET["pagina"]) ? $_GET["pagina"] : "home";
			$show = self::setUrl($url);

			$this->setController($show);
			$this->setMethod($show);
			$this->setParam($show);

			call_user_func_array([$this->controller, $this->method], $this->param);
		}

		private function setController($url){
			if(file_exists("app/Controllers/".$url[0].".php")){
				$this->controller = $url[0];
				unset($url[0]);
			}else{
				$this->controller = "pageNotFound";
				$this->method = "pagenot";
			}	

			require_once "app/Controllers/".$this->controller.".php";
			$this->controller = new $this->controller;
		}

		private function setMethod($url){
			if(isset($url[1]) AND method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		private function setParam($url){
			if (count($url) > 2) {
		    	$this->param = array_slice($url, 2);
		    }
		}

		private function setUrl($param){
			return explode("/", filter_var(rtrim($param), FILTER_SANITIZE_URL));
		}
	}