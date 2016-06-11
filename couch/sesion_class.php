<?php
	class sesion {
		function __construct() {
			session_start();
			session_name('nombreDeSession');
		}
	
		public function setIdUsuario($idusuario){
			$_SESSION['idusuario']=$idusuario;
		}
		
		public function setMail($mail){
			$_SESSION['email']=$mail;
		}
	
		public function setRoll($roll){
			$_SESSION['roll']=$roll;
		}
	
		public function setPremium($premium){
			$_SESSION['premium']=$premium;
		}
	
		public function setFechaPremium($fecha){
			$_SESSION['fechaPremium']=$fecha;
		}
	
		public function setPassword($pass){
			$_SESSION['pass']=$pass;
		}
	
		function get(){
			if(isset($_SESSION)){
				if(!empty($_SESSION)){
					return true;
				}
				else{
					return false;
				}
			}
		}
	
		function getIdUsuario(){
			if(isset($_SESSION['idusuario'])){
				if(!empty($_SESSION['idusuario'])){
				return $_SESSION['idusuario'];
				}
				else{
					return false;
				}
			}
	}
	
	function getMail(){
		if(isset($_SESSION['email'])){
			if(!empty($_SESSION['email'])){
				return $_SESSION['email'];
			}
			else{
				return false;
			}
		}
	}
	
	function getRoll(){
		if(isset($_SESSION['roll'])){
			if(!empty($_SESSION['roll'])){
				return $_SESSION['roll'];
			}
			else{
				return false;
			}
		}
	}
	
	function getPremium(){
		if(isset($_SESSION['premium'])){
			if(!empty($_SESSION['premium'])){
				return $_SESSION['premium'];
			}
			else{
				return false;
			}
		}
	}
	
	function getFechaPremium(){
		if(isset($_SESSION['fechaPremium'])){
			if(!empty($_SESSION['fechaPremium'])){
				return $_SESSION['fechaPremium'];
			}
			else{
				return false;
			}
		}
	}
	
	function getPass(){
		if(isset($_SESSION['pass'])){
			if(!empty($_SESSION['pass'])){
				return $_SESSION['pass'];
			}
			else{
				return false;
			}
		}
	}
	
	public function logout() {
		unset($_SESSION['idusuario']);
		unset($_SESSION['email']);
		unset($_SESSION['roll']);
		unset($_SESSION['premium']);
		unset($_SESSION['fechaPremium']);
		unset($_SESSION['pass']);
	}
}
?>