<?php
	//Declaration of Constants 
	define("LOGIN_PAGE", realpath(dirname(__DIR__))."/login.php");
	define("INDEX_PAGE", realpath(dirname(__DIR__))."/index.php");
	define("DATABASE_PATH", realpath(dirname(__DIR__))."/database/database.php");
	define("SEARCHER_PATH", realpath(dirname(__DIR__))."/database/searcher.php");
	define("ADD_PAGE", "assets/add.php");
	define("PHOTO_PATH", "assets/imgs/");
	define("ICONS_PATH", "assets/icons");
	define("SCRIPT_PATH", "assets/scripts");
	define("MAIN_CSS", "assets/css/main.css");
	define("PERFIL_PAGE", "assets/perfil.php");
	define("LOGIN_CSS", "assets/css/login.css");

	//Class Declaration
	class Head{
		private $ico = "/contact.png";
		private $link_external = [
			[
				"rel"=>"stylesheet",
				"href"=>"https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css",
				"crossorigin"=>"anonymous"
			]
		];
		private $link_interval = [
			[
				"rel"=>"stylesheet",
				"type"=>"text/css",
				"href"=>MAIN_CSS
			],
			[
				"rel"=>"stylesheet",
				"type"=>"text/css",
				"href"=>LOGIN_CSS	
			],
			[
				"rel"=>"icon",
				"type"=>"image/x-icon",
				"href"=>ICONS_PATH."/contact.png"
			]
		];


		public $title = 'CRUD PHP';

		public function title($str = null){
			$string = $str != null ? $str : $this->title;
			echo "<title>$string</title>";
		}

		public function link($src = null, $add = false){
			$default = $this->link_external;
			array_push($default,...$this->link_interval);

			foreach ($default as $key => $value) {
				$tmp = "";
				foreach ($value as $attribute => $string) {
					$tmp .= " {$attribute}='{$string}'";
				}
				echo "<link {$tmp}/>";
			}
		}

	}
	class Body{
		public function nav(){
			$nav = include ('nav.php');
			return $nav;
		}
	}
?>