<?php
class sesion {
	function __construct() {
		session_start();
	}
  
	public function set($idusuario, $mail, $roll, $premium, $pass){
		session_name('nombreDeSession');
		$_SESSION['idusuario']=$idusuario;
		$_SESSION['email']=$mail;
		$_SESSION['roll']=$roll;
		$_SESSION['premium']=$premium;
		$_SESSION['pass']=$pass;
	}
	
	public function get() {
		if(isset($_SESSION['idusuario'])){
			if(!empty($_SESSION['idusuario'])){
				$s['idusuario']=$_SESSION['idusuario'];
				$s['email']=$_SESSION['email'];
				$s['roll']=$_SESSION['roll'];
				$s['premium']=$_SESSION['premium'];
				$s['pass']=$_SESSION['pass'];
				return $s;
			}
		}
		else{
			return false;
		}
	}
	
	public function logout() {
		unset($_SESSION['idusuario']);
		unset($_SESSION['email']);
		unset($_SESSION['roll']);
		unset($_SESSION['premium']);
		unset($_SESSION['pass']);
	}
}
?>