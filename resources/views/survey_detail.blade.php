@extends('template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">

                    <h3>ID : {{ $survey->description }} </h3>
                    <h4>
                        Inicio : {{ $survey->date_start }} - Fin : {{ $survey->date_end }}
                    </h4>
                    {{ session('success') }}
                </div>
                {{-- <div class="col-sm-3">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                                <li class="breadcrumb-item active">Encuesta Mantenimiento</li>
                                            </ol>
                                        </div> --}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
        onclick="New();$('#survey_detail')[0].reset();">
        Agregar Pregunta
    </button>
    <p></p>



    <div class="row mb-2">


        <div class="col col-md-12">

            <form action="" method="post" role="form" id="survey_detail" name="survey_detail">
                <input type="hidden" name="id" id="id">
                {{ csrf_field() }}
                <h2>Pregunta</h2>
                <textarea type="text" name="question" id="quiestion" class="form-control" rows="4px"> </textarea>
        </div>
        <p></p>
        <div class="col col-md-12">
            <p></p>
        </div>
        <div class="col col-md-6">
            <h2>Tipo de Pregunta</h2>
            <select name="type" id="type" class="form-control">
                <option value="short_answer">Eligir Tipo de Pregunta</option>
                <option value="short_answer">Respuesta Corta</option>
                <option value="multiple_option">Varias Opciones</option>
                <option value="boxes">Casillas</option>
                <option value="">Desplegable</option>
                <option value="option_date">Fecha</option>
                <option value="option_hour">Hora</option>
            </select>
        </div>


        <div class="col col-md-6">
            <h2>Requerido</h2>
            <input type="radio" name="requerid" id="requerid" value="yes"> &nbsp;&nbsp;Sí &nbsp;&nbsp;
            <input type="radio" name="requerid" id="requerid"value="not"> &nbsp;&nbsp;No
        </div>


        <div class="col-md-6">
            <p></p>
            <div id="radioContainer" style="display: none;">
                <input id="count_option"type="number" value="5" class="form-control">
                <p></p>
                <div class="input-group mb-3">

                    <div class="input-group-prepend"id="inputContainer">

                        <span class="input-group-text"><input type="radio" disabled></span>
                    </div>
                    <input type="text"id="radio_option" class="form-control" placeholder="Opción">
                </div>

            </div>
            <div id="textContainer" style="display: none;">
                <div class="input-group mb-3">
                    <input type="text" class="form-control"placeholder="Texto de respuesta corta" disabled>
                </div>

            </div>
        </div>





    </div>

    <script>

   function addAlternativer() {
         // Obtener el elemento input de tipo número
                var countInput = document.getElementById('count_option');

                // Escuchar el evento 'input' en el campo de entrada
                countInput.addEventListener('input', function() {
                    // Obtener el valor del campo de entrada
                    var countValue = parseInt(countInput.value);

                    // Verificar si el valor es un número válido
                    if (!isNaN(countValue) && countValue > 0) {
                        // Obtener el contenedor donde se agregarán los campos de entrada
                        var container = document.getElementById('inputContainer');

                        // Limpiar el contenedor antes de agregar nuevos campos
                        container.innerHTML = '';

                        // Generar los campos de entrada de tipo radio consecutivos
                        for (var i = 1; i <= countValue; i++) {
                            var radioInput = document.createElement('input');
                            radioInput.type = 'radio';
                            radioInput.value = i;
                            radioInput.name = 'option';

                            var label = document.createElement('label');
                            label.innerHTML = i;

                            container.appendChild(radioInput);
                            container.appendChild(label);
                            container.appendChild(document.createElement('br'));
                        }
                    }
                });
   }
      
           
    </script>



    <h1>Controls</h1>
    <input type="button" value="Nuevo" class="btn btn-warning" onclick="New();$('#survey_detail')[0].reset();"
        name="new">
    <input type="button" value="Guardar" class="btn btn-success"id="create" onclick="survey_detailStore()"
        name="create">
    <input type="button" value="Modificar" class="btn btn-danger"id="update" onclick="survey_detailUpdate();"
        name="update">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </form>
    <script>
        const selectElement = document.getElementById('type');
        const radioContainer = document.getElementById('radioContainer');
        const textContainer = document.getElementById('textContainer');
        const radio_option = document.getElementById('radio_option');
        //VALIDAR TIPO DE PREGUNTA
        selectElement.addEventListener('change', function() {
            if (selectElement.value === 'multiple_option') {
                radioContainer.style.display = 'block';


                
            } else {
  
            }

            if (selectElement.value === 'short_answer') {
                textContainer.style.display = 'block';
            } else {
                textContainer.style.display = 'none';
            }
        });

        radio_option.addEventListener('keydown', function() {

        });
    </script>


    <p></p>
    <!-- /.content -->
    {{-- {{ $survey->onEachSide(5)->links() }} --}}
    <div id="mycontent">



        @include('survey_detailtable')

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mantenimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    @endsection
