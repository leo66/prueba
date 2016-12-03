$("#frmregistro").validate({
    rules: {
      nombre: {
        required: true,
        lettersonly: true
      },
        apellido: {
        required: true,
        lettersonly: true
      },
        correo: {
        required: true,
        email:true
      },
        clave: {
        required: true
          
      },
        txt_clave2: {
        required: true,
        equalTo: clave
      },
 
     
    },
    messages: {
        nombre:{
        lettersonly:"Introduce solo letras"
      },
        apellido:{
        lettersonly:"Introduce solo letras"
      },
        correo: {
        email:"Introduce direcion de correo valida"
      },
        clave:{
      },
        txt_clave2:{
        required:"Repite la clave"     
      }
    },
    submitHandler: function(form) {
      alert("formulario enviado");
    }
  });
