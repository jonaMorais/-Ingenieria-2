function validarUsuario(){

	mail = document.getElementById('mail').value;				
	clave = document.getElementById('pass').value;
		
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(mail == null || mail.length== 0){
		alert('Por favor ingrese su mail');
		return false;
	}
	else{
		if(!expr.test(mail)){
			alert('formato de mail erroneo');
			return false;
		}
	}
	
	if(clave == null || clave.length == 0){
		alert('Ingrese su clave por favor');
		return false;
	}
	else{
		if(clave.length<6){
			alert('La clave debe tener como mínimo seis caracteres.');
			return false;
		}
	}
}


function validarClave(){

	claveAct = document.getElementById('claveAct').value;
	pass1 = document.getElementById('pass1').value;
	pass2 = document.getElementById('pass2').value;

	if(claveAct == null || claveAct.length == 0){
		alert('Ingrese su clave por favor');
		return false;
	}
	else{
		if(claveAct.length<6){
			alert('La clave debe tener como mínimo seis caracteres.');
			return false;
		}
	}


	if(pass1 == null || pass1 == ""){
		alert('Por favor ingrese la nueva contraseña');
		return false;
	}
	else{
		if(pass1.length<6){
			alert('La clave debe tener como mínimo seis caracteres.');
			return false;
		}
	}


	if(pass2 == null || pass2 == ""){
		alert('Por favor reingrese la nueva contraseña');
		return false;
	}
	else{
		if(pass2.length<6){
			alert('La clave debe tener como mínimo seis caracteres.');
			return false;
		}
	}

	if(claveAct == pass1){
		alert('La clave debe ser diferente a la actual');
		return false;
	}
	else{
		if(pass1 != pass2){
			alert('La nuevas contraseñas deben coincidir');
			return false;
		}
	}
}

function validarNuevoCouch(){

	tipo = document.getElementById('tipo').value;

	if(tipo == null || tipo == ""){
		alert('Por favor ingrese el nombre del nuevo tipo de Coucha');
		return false;
	}

}