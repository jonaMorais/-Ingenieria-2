function validarUsuario(){

	var mail = document.getElementById("mail");
	var nom = document.getElementById("nombre");
	var ape = document.getElementById("apellido");
	var pass = document.getElementById("pass").value;
	var fecha = document.getElementById("datepicker");
	var tel = document.getElementById("telefono");

	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	num = [0-9];
	
	if(mail.value == null || mail.value== ""){
		alert('Por favor ingrese su mail.');
		return false;
	}
	else{
		if(!expr.test(mail.value)){
			alert('formato de mail erroneo.');
			return false;
		}
	}
	
	if(nom.value == null || nom.value == ""){
		alert('por favor ingrese su nombre.');
		return false;
	}
	else{
		if(num.test(nom)){
			alert('NO estan permitidos los numeros en el nombre.');
			return false;
		}	
	}
	
	if(ape.value == null || ape.value == ""){
		alert('Por favor ingrese su apellido.');
		return false;
	}
	
	if(pass == null || pass == ""){
		alert('Por favor ingrese su contraseña.');
		return false;
	}
	else{
		if(pass.length < 6){
			alert('La contraseña debe tener al menos 6 caracteres.');
			return false;
		}
	}

	if(fecha.value == null || fecha.value == ""){
		alert('Por favor ingrese su fecha de nacimiento.');
		return false;
	}
	
	if(tel.value == null || tel.value == ""){
		alert('Por favor ingrese su telefono.');
		return false;
	}
	
	return true;

}