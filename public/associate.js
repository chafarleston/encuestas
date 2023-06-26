
function associateStore() {
    var formData = new FormData(document.getElementById("associate"));
    axios({
            method: 'post',
            url: 'associateStore',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
  //carga pdf- csv - excel
  datatable_load();
  alert('Registrado Correctamente');
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function associateEdit(id) {
    var formData = new FormData(document.getElementById("associate"));
    formData.append("id",id);
    axios({
            method: 'post',
            url: 'associateEdit',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
           // contentdiv.innerHTML = response.data["description"];
            associate.id.value=response.data["id"];
            associate.description.value=response.data["description"];
            associate.detail.value=response.data["detail"];

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function associateUpdate() {
    var formData = new FormData(document.getElementById("associate"));
    axios({
            method: 'post',
            url: 'associateUpdate',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
              //carga pdf- csv - excel
              datatable_load();
              alert('Modificado Correctamente');

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function associateDestroy(id) {

if(confirm("¿Quieres eliminar este registro?")){
  var formData = new FormData(document.getElementById("associate"));
    formData.append("id",id)
    axios({
            method: 'post',
            url: 'associateDestroy',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
              //carga pdf- csv - excel
              datatable_load();
              alert('Eliminado Correctamente');

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });
}
}

function associateShow(id) {
    var formData = new FormData();
    formData.append('id', id);
    axios({
            method: 'post',
            url: '../associateShow',
            data: formData,
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent_associate");
            contentdiv.innerHTML = response.data;
              //carga pdf- csv - excel
           //   datatable_load();
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}
