/* Script para habilitar o deshabilitar elementos del formulario */

/* <![CDATA[ */

function valida_envia0(form){
    //valido el nombre
    if (form.nombre.value.length==0){
    if (form.nombre.disabled==false){
       alert("Debe introducir un nombre")
       form.nombre.focus()
       return 0;
    	}
     }


    //valido el email
    if (form.email.value.length==0){
    if (form.email.disabled==false){
       alert("Debe introducir una dirección de email")
       form.email.focus()
       return 0;
    	}
     }

    //valido el fecha de llegada
    if (form.fechallegada.value.length==0){
    if (form.fechallegada.disabled==false){
       alert("Debe introducir una fecha de llegada")
       form.fechallegada.focus()
       return 0;
    	}
     }


    //valido el fecha de salida
    if (form.fechasalida.value.length==0){
    if (form.fechasalida.disabled==false){
       alert("Debe introducir una fecha de salida")
       form.fechasalida.focus()
       return 0;
    	}
     }

   //valido que la fecha de salida sea posterior a la fecha de entrada
	primerElemento = document.getElementById("element1").value;
	segundoElemento = document.getElementById("element2").value;



	fechaprimerElemento = primerElemento.split('/');
	diaelemento1 = fechaprimerElemento[0];
	meselemento1 = fechaprimerElemento[1] - 1;
	anoelemento1 = fechaprimerElemento[2];
	fechaelemento1 = new Date(anoelemento1,meselemento1,diaelemento1);

	fechasegundoElemento = segundoElemento.split('/');
	diaelemento2 = fechasegundoElemento[0];
	meselemento2 = fechasegundoElemento[1] - 1;
	anoelemento2 = fechasegundoElemento[2];
	fechaelemento2 = new Date(anoelemento2,meselemento2,diaelemento2);

	if (fechaelemento2 <= fechaelemento1){
	alert("La Fecha de salida ha de ser posterior a la Fecha de entrada")
       return 0;
	}

	if (fechaelemento1 < fechaActual){
	alert("La Fecha de entrada ha de ser posterior o igual al día de hoy")
       return 0;
	}

    //valido el número de pasajeros
    if (form.pasajeros.value.length==0){
    if (form.pasajeros.disabled==false){
       alert("Debe introducir un número de pasajeros")
       form.pasajeros.focus()
       return 0;
    	}
     }

//valido que la fecha de salida sea posterior a la fecha de entrada
	primerElemento = document.getElementById("element1").value;
	segundoElemento = document.getElementById("element2").value;



	fechaprimerElemento = primerElemento.split('/');
	diaelemento1 = fechaprimerElemento[0];
	meselemento1 = fechaprimerElemento[1] - 1;
	anoelemento1 = fechaprimerElemento[2];
	fechaelemento1 = new Date(anoelemento1,meselemento1,diaelemento1);

	fechasegundoElemento = segundoElemento.split('/');
	diaelemento2 = fechasegundoElemento[0];
	meselemento2 = fechasegundoElemento[1] - 1;
	anoelemento2 = fechasegundoElemento[2];
	fechaelemento2 = new Date(anoelemento2,meselemento2,diaelemento2);

	if (fechaelemento2 <= fechaelemento1){
	alert("La Fecha de salida ha de ser posterior a la Fecha de entrada")
       return 0;
	}

	var fechaActual = new Date();
	//mes y año actuales 
	var diadeHoy = fechaActual.getDate();
	var mesActual = fechaActual.getMonth();
	var anoActual = fechaActual.getFullYear();
	var fechaActual = new Date(anoActual,mesActual,diadeHoy);

	if (fechaelemento1 < fechaActual){
	alert("La Fecha de entrada ha de ser posterior o igual al día de hoy")
       return 0;
	}

    //el formulario se envia
    form.submit();
}

/* ]]> */

/* FIN del Script para habilitar o deshabilitar elementos del formulario */
