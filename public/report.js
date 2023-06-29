function reportStore() {
      // Obtener todos los checkboxes
      let checkboxes = document.querySelectorAll("input[type=checkbox][name=columns]");
      let checkedValues = [];

      // Iterar sobre los checkboxes y guardar los valores activados
      for (let checkbox of checkboxes) {
        if (checkbox.checked) {
          checkedValues.push(checkbox.value);
        }
      }

      // Mostrar los valores activados
      //alert(checkedValues);
    var formData = new FormData();
        formData.append("columns",checkedValues);
  axios({
    method: "post",
    url: "../reportStore",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //Manejar el éxito de la respuesta
       var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
    
    })
    .catch(function(error) {
      //Manejar el error
      console.log(error);
    });
}

function refresh() {
  alert("Registrado Correctamente");
  window.location.reload();
}
