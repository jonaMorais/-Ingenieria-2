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
		alert('Por favor ingrese el nombre del nuevo tipo de Couch');
		return false;
	}

}

function validarUsuarioAdd(){

	var mail = document.getElementById("mail");
	var nom = document.getElementById("nombre");
	var ape = document.getElementById("apellido");
	var pass = document.getElementById("pass").value;
	var pass2 = document.getElementById("pass2").value;
	var fecha = document.getElementById("fechaNacimiento");
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
		if(isNaN(nom.value) == false){
			alert('NO estan permitidos los numeros en el nombre.');
			return false;
		}	
	}
	if(ape.value == null || ape.value == ""){
		alert('Por favor ingrese su apellido.');
		return false;
	}
	else{
		if(isNaN(ape.value) == false){
			alert('NO estan permitidos los numeros en el apellido.');
			return false;
		}	
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
	if(pass2 == null || pass2 == ""){
		alert('Por favor ingrese confirme su contraseña.');
		return false;
	}
	else{
		if(pass2.length < 6){
			alert('La confirmacion de la contraseña a debe tener al menos 6 caracteres.');
			return false;
		}
		else{
			if(pass != pass2){
				alert("Las contraseñas no coinciden.");
				return false;
			}
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

function validarTipo(){
	
	var opc = document.getElementById("Tipos").selectedIndex;	
	if(opc == null || opc == 0){
		alert('Debes seleccionar una tipo de Couch.');
		return false;
	}
	return true;
}

function validarTipo2(){
	
	var nom = document.getElementById("nombre");	
	if(nom.value == null || nom.value == 0){
		alert('El campo nombre esta vacio.');
		return false;
	}
	return true;
}

function validarCouch(){

	var titulo = document.getElementById("titulo");
	var desc = document.getElementById("descrip");
	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var plazas = document.getElementById("cantplazas");
	var tipo = document.getElementById("tipo").selectedIndex;
	var foto = document.getElementById("foto");
	var expr = /^(?:[\w]\:|\\)(\\[a-z_\-\s0-9\.]+)+\.(png|gif|jpg|jpeg)$/;
	
	if(titulo.value == null || titulo.value == ""){
		alert('El campo titulo esta vacio.');
		return false;
	}
	else{
		if(isNaN(titulo.value) == false){
			alert('NO estan permitidos los numeros en el campo titulo.');
			return false;
		}
	}
	if(desc.value == null || desc.value == ""){
		alert('El campo descripcion esta vacio.');
		return false;
	}
	else{
		if(isNaN(desc.value) == false){
			alert('NO estan permitidos los numeros en el campo descripcion.');
			return false;
		}	
	}
	if(prov == null || prov == 0){
		alert('Debe seleccionar una provincia.');
		return false;
	}
	if(loc == null || loc == 0){
		alert('Debe seleccionar una localidad.');
		return false;
	}
	if(plazas.value == null || plazas.value == 0){
		alert('El campo cantidad de plazas esta vacio.');
		return false;
	}
	if(tipo == null || tipo == 0){
		alert('Debe seleccionar un tipo de couch.');
		return false;
	}
	if(!expr.test(foto.value)){
		alert('Debe seleccionar una foto.');
		return false;
	}
}

function validarBusqueda(){

	var busqueda = document.getElementById("busqueda");

	if(busqueda.value == null || busqueda.value == 0){
		alert('Ingrese un valor a buscar.');
		return false;
	}
	else{
		if(busqueda.value.length > 0){
			if(isNaN(busqueda.value) == false){
				alert('NO estan permitidos los numeros en el campo de busqueda.');
				return false;
			}
		}
	}
}

function validarBusquedaAvanzada(){

	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var desde = document.getElementById("datepicker");
	var hasta = document.getElementById("datepicker2");
	var plazas = document.getElementById("plazas");
	var tipo = document.getElementById("Tipos").selectedIndex;

	if(desde.value != null){
		if(hasta.value != null){
			if(hasta.value.length > 0){
				if(desde.value > hasta.value){
					alert('La fecha desde es mayor que la fecha hasta.');
					return false;
				}
			}
		}
	}
	if((prov == null || prov == 0) && (loc == null || loc == 0) && (desde.value == null || desde.value.length == 0) && (hasta.value == null || hasta.value.length == 0) && (plazas.value == null || plazas.value.length == 0) && (tipo == null || tipo == 0)){
		alert('Complete al menos un campo.');
		return false;
	}
	return true;
}

function validarPremium(){

	var tarjeta = document.getElementById("tarjeta");
	var codigo = document.getElementById("codigo");
	
	if(tarjeta.value == null || tarjeta.value == 0){
		alert('el campo tarjeta esta vacio.');
		return false;
	}
	else{
		if(tarjeta.value.length < 16){
			alert('La longitud del numero de tarjeta debe ser de 16 caracteres.');
			return false;
		}
		if(tarjeta.value.length > 16){
			alert('La longitud del numero de tarjeta debe ser de 16 caracteres.');
			return false;
		}
	}
	if(codigo.value == null || codigo.value == 0){
		alert('El campo codigo de seguridad esta vacio.');
		return false;
	}
	else{
		if(codigo.value.length < 3){
			alert('La longitud del codigo de seguridad debe ser de 3 caracteres.');
			return false;
		}
	}
	return true;
}

function validarClaveRecuperada(){

	var mail= document.getElementById("email");
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
}


//PUMA
function validarResumenSoli(){
		var fechainicio= document.getElementById("fechaInicio");
		var fechalimite= document.getElementById("fechaLimite");
		if(fechainicio.value != null){
			if(fechalimite.value != null){
				if(fechalimite.value.length > 0){
					if(fechainicio.value > fechalimite.value){
						alert('La fecha de inicio es mayor que la fecha limite.');
						return false;
					}
				}
			}
		}
		if((fechainicio.value == null || fechainicio.value.length == 0)){
			alert('Complete el campo fecha inicio');
			return false;
		}
		if((fechalimite.value == null || fechalimite.value.length == 0)){
			alert('Complete el campo fecha limite');
			return false;
		}
		return true;
}