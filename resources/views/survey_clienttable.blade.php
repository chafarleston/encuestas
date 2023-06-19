   <div class="row">
       <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
           <div class="row">
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


           </div>
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
                           <div class="page" style="display: none;">
                               {{-- {{$survey_details->id}} --}}

                               <form action="" method="post" id="survey_client" name="survey_client">
                                   <p></p>
                                   <input type="hidden" value="{{$survey_details->id}}" name="survey_detail_id" id="survey_detail_id">
                                   <input type="hidden" value="{{$survey_details->type}}" name="type" id="type">
                                   
                                   {{ csrf_field() }}
                                   <h4>
                                       {{ $enumeracion = $enumeracion + 1 }}
                                       {{ '. ' . $survey_details->question }}</h4>
                                   @if ($survey_details->type == 'short_answer')
                                       <textarea  cols="90%" id="answer"name="answer"></textarea>
                                   @elseif($survey_details->type == 'multiple_option')
                                       <?php
                                       $array = json_decode($survey_details->option);
                                       ?>
                                       @foreach ($array as $item)
                                           <label style="display: flex; align-items: center;">
                                               <input style="" type="radio" name="option"
                                                   value="{{ $item }}" id="option">&nbsp;
                                               {{ $item }}
                                           </label>
                                           <p></p>
                                       @endforeach
                                   @endif
                                   @if (!$loop->last)
                                       <button id="prev" class="btn btn-success btn-lg"
                                           onclick="prevPage()">atras</button>
                                       <button id="next" class="btn btn-success btn-lg"
                                           onclick="survey_clientStore();return false;">Siguiente</button>
                                       <p></p>
                                   @endif

                                   @if ($loop->last)
                                       <button id="next" class="btn btn-success btn-lg"
                                           onclick="">Finalizar</button>
                                   @endif
                               </form>
                           </div>
                       @endforeach


                       <p>
                           <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                               Demo v1</a>
                       </p>


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




       <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
           <img width="100%" src="https://cdn.pixabay.com/photo/2019/01/26/21/40/survey-3957027_1280.jpg"
               alt="" srcset="">
           {{-- <h3 class="text-primary"><i class="fas fa-paint-brush"></i> AdminLTE v3</h3>
                            <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt
                                tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh
                                mi,
                                qui irure terr.</p>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Client Company
                                    <b class="d-block">Deveint Inc</b>
                                </p>
                                <p class="text-sm">Project Leader
                                    <b class="d-block">Tony Chicken</b>
                                </p>
                            </div>
                            <h5 class="mt-5 text-muted">Project files</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-file-word"></i>
                                        Functional-requirements.docx</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-file-pdf"></i>
                                        UAT.pdf</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-envelope"></i>
                                        Email-from-flatbal.mln</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-image "></i>
                                        Logo.png</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-file-word"></i>
                                        Contract-10_12_2014.docx</a>
                                </li>
                            </ul>
                            <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                            </div> --}}
       </div>
   </div>
