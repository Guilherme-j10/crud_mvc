<?php
	
	namespace app\Core;

	class coreController{

		public function model($model){
		    require 'app/Models/' . $model . '.php';
		    $classe = 'app\\Models\\' . $model;
		    return new $classe();
  		}

		public function view($view, $titulo, $dados = []){
			require_once "app/Views/".$view.".php";
		}

		public function pageNotFound(){
			self::view('erro404', null);
		}

	}