   <div class="row">
       <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
           {{-- <div class="row">
               <div class="col-12 col-sm-4">
                   <div class="info-box bg-light">
                       <div class="info-box-content">
                           <span class="info-box-text text-center text-muted">Cantidad de
                               Preguntas</span>
                           <span class="info-box-number text-center text-muted mb-0">{{ $survey_count }}
                           </span>
                       </div>
                   </div>
               </div>


           </div> --}}
           <div class="row">
               <div class="col-12">
                   {{-- <h4>Recent Activity</h4> --}}
                   <div class="post">
                       {{-- <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                            </span>
                                            <span class="description">Shared publicly - 7:45 PM today</span>
                                        </div> --}}
                       @php
                           $enumeracion = 0;
                       @endphp
                       @foreach ($survey_detail as $survey_details)
                           @if ($loop->first)
                               <div class="page" style="display: none;">
                                   <div class="row container d-flex justify-content-center align-items-center">
                                        <div class="col col-lg-4 col-mb-4">
                                           <img src="{{ asset('imagen-de-encuesta.png') }}" alt=""
                                               srcset="" width="95%">
                                       </div>

                                       <div class="col col-lg-8">
                                           <form action="" name="client" id="client">
                                                <h2 style="color:#042d89;text-align:justify"><b>{{ $survey->description }}</b></h2>
                                               @if ($survey_details->survey->state == 'private')
                                                   <p>Este es un formulario privado, ingrese el código por favor:</p>
                                                   <input type="hidden" value="private" name="state" id="state">
                                                   <input type="password" name="code" id="code"
                                                       class="form-control">
                                               @elseif ($survey_details->survey->state == 'public')
                                                   <input type="hidden" value="public" name="state" id="state">
                                               @endif

                                               <p></p>
                                              
                                               <button id="next" class="btn btn-lg"
                                                   style="background-color: #00bf6f; color: white"
                                                   onclick="clientStore(); return false;">&nbsp; Iniciar &nbsp;</button>
                                                    &nbsp;&nbsp;<b style="color:black">Cantidad de Preguntas :{{$survey_count}} </b>
                                           </form>
                                       </div>

                                      
                                   </div>
                               </div>
                           @endif



                           <div class="page" style="display: none;">
                               {{-- {{$survey_details->id}} --}}

                               <form action="" method="post" id="survey_client{{ $enumeracion + 1 }}"
                                   name="survey_client">

                                   <input type="hidden"class="client_id" name="client_id"id="client_id">
                                   <p></p>
                                   <input type="hidden" value="{{ $survey_details->id }}" name="survey_detail_id"
                                       id="survey_detail_id">
                                   <input type="hidden" value="{{ $survey_details->type }}" name="type"
                                       id="type">

                                   {{ csrf_field() }}
                                   <h3 style="color:black"> {{ $survey_details->title }}</h3>
                                    <span style="color:red"> {{ $survey_details->detail }}</span>
                                    <p></p>
                                   <h4 style="color:black">
                                       {{ $enumeracion = $enumeracion + 1 }}
                                       {{ '. ' . $survey_details->question }}</h4>
                                  <p></p>

                                   @if ($survey_details->type == 'short_answer')
                                       <input id="answer" name="answer" class="form-control" required>
                                       @error('answer')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                       <p></p>

                                   @elseif($survey_details->type == 'code')
                                       <input id="answer" name="answer" class="form-control" required>
                                       @error('answer')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                       <p></p>
                                    @elseif($survey_details->type == 'file')
                                       <input id="answer" type="file" name="answer" class="form-control" required>
                                       @error('answer')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                       <p></p>
                                   @elseif($survey_details->type == 'multiple_option')
                                       <?php
                                       $array = json_decode($survey_details->option);
                                       ?>
                                       {{-- @foreach ($array as $item)
                                           <label style="display: flex; align-items: center;">

                                               <input style="" type="radio" name="option"
                                                   value="{{ $item }}" id="option">&nbsp;
                                               {{ $item }}
                                           </label>
                                       @endforeach --}}

@foreach ($array as $index => $item)
    @php
        $enumeration = $index + 1;
    @endphp
    <label style="display: flex; align-items: center;">
        <input style="" type="radio" name="option" value="{{$enumeration}}-{{$item}}" id="option">&nbsp;
        {{ $item }}
    </label>
@endforeach


                                       <label style="display: none; align-items: center;">

                                           <input style="" type="radio" name="option" value="no_respondido"
                                               id="option" checked>&nbsp;
                                           No respondido
                                       </label>
                                       <p></p>
                                   @elseif($survey_details->type == 'date')
                                       <input type="date" name="date" id="date" class="form-control">

                                       <script>
                                           // Obtener el elemento de entrada de fecha por su ID
                                           var dateInput = document.getElementById("date");

                                           // Crear un objeto de fecha actual
                                           var fechaActual = new Date();

                                           // Formatear la fecha actual en el formato "YYYY-MM-DD"
                                           var fechaFormatted = fechaActual.toISOString().slice(0, 10);

                                           // Asignar la fecha actual al valor del campo de entrada
                                           dateInput.value = fechaFormatted;
                                       </script>





                                       <p></p>
                                   @elseif($survey_details->type == 'selection')
                                       @if ($survey_details->selection->state == '0')
                                           <select name="selection_detail_id" id="selection_detail_id"
                                               class="form-control">
                                               @foreach ($survey_details->selection->selection_detail()->orderBy('description', 'asc')->get() as $item)
                                                   <option value="{{ $item->id . '-' . $item->description }}">
                                                       {{ $item->description }} </option>
                                               @endforeach
                                           </select>
                                       @elseif($survey_details->selection->state == '2')
                                           <div id="mycontent_associate{{ $enumeracion }}">
                                               <select name="selection_detail_id" id="selection_detail_id"
                                                   class="form-control"
                                                   onchange="associateShow(this.value,'{{ $enumeracion + 1 }}')">
                                                   <option value="0">- Elija una Opción -</option>
                                                   @foreach ($survey_details->selection->selection_detail as $item)
                                                       <option value="{{ $item->id . '-' . $item->description }}">
                                                           {{ $item->description }} </option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       @else
                                           {{-- Aquí enumeracion es + 1 para imprimir el cambio en la siguiente vuelta  o iteracion donde
                                        aparecerá el div myconten_associate
                                        --}}
                                           <input type="hidden" name="associate"id="associate" value="true">
                                           <select name="selection_detail_id" id="selection_detail_id"
                                               class="form-control"
                                               onchange="associateShow(this.value,'{{ $enumeracion + 1 }}')">
                                               <option value="0">- Elija una Opción -</option>
                                               @foreach ($survey_details->selection->selection_detail as $item)
                                                   <option value="{{ $item->id . '-' . $item->description }}">
                                                       {{ $item->description }} </option>
                                               @endforeach
                                           </select>
                                       @endif




                                       <p></p>
                                   @endif
                                   @if (!$loop->last)
                                       {{-- <button id="prev" class="btn btn-warning btn-lg"
                                           onclick="prevPage()">atras</button> --}}
                                       <button id="next" class="btn btn-lg" style="background-color: #00bf6f;color: white"
                                           onclick="survey_clientStore('{{ $enumeracion }}'); return false;">Siguiente</button>
                                       <p></p>
                                   @endif

                                   @if ($loop->last)
                                       <button class="btn  btn-lg" style="background-color: #00bf6f;color: white"
                                           onclick="survey_clientStore('{{ $enumeracion }}'); refresh();return false;">Finalizar</button>
                                   @endif
                               </form>
                           </div>
                       @endforeach


                       {{-- <p>
                           <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                               Demo v1</a>
                       </p> --}}


                   </div>
               </div>
           </div>



       </div>


       <script>
           var currentPage = 0;
           var pages = document.getElementsByClassName('page');

           function showPage(index) {
               if (index < 0 || index >= pages.length) {
                   return; // No hace nada si el índice está fuera de los límites
               }

               // Oculta la página actual
               if (currentPage < pages.length) {
                   pages[currentPage].style.display = 'none';
               }

               // Muestra la página solicitada
               pages[index].style.display = 'block';

               // Actualiza la página actual
               currentPage = index;
           }

           function nextPage() {
               showPage(currentPage + 1);
           }

           function prevPage() {
               showPage(currentPage - 1);
           }

           // Muestra la primera página al cargar la página
           showPage(0);
       </script>





   </div>
