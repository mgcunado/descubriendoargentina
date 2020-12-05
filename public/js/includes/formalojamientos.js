function check(idd) {
	if (document.getElementsByName(idd)[0].checked == false){ 
		document.getElementsByName(idd)[0].checked = true; 
	} else {
		document.getElementsByName(idd)[0].checked = false;
	}
}

function mostrardiv(flotante) {
	div = document.getElementById(flotante);
	div.style.display = ''; 
}

function mostrarformulario() {
	div = document.getElementById('formularioemail');
	div.style.display = ''; 
}

function evitarSpam() {
	// Si el campo está vacío, envía el formulario.
	if(!document.getElementById("controlspam").value) { 
		return true;
	} 
	// Si el campo tiene algún valor, es un spam bot
	else {
		return false;
	}
}
