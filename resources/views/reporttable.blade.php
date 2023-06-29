   <div class="row">
       <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
           {{-- <div class="row">
               <div class="col-12 col-sm-4">
                   <div class="info-box bg-light">
                       <div class="info-box-content">
                           <span class="info-box-text text-center text-muted">Cantidad de
                               Preguntas</span>
                           <span class="info-box-number text-center text-muted mb-0">0
                           </span>
                       </div>
                   </div>
               </div>


           </div> --}}

      <!--  USO DE DATATABLE PARA GENERAR PDF - CSV  -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-html5-1.6.4/b-print-1.6.4/sl-1.3.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-html5-1.6.4/b-print-1.6.4/sl-1.3.1/datatables.min.js">
    </script>
           <div class="row">

               <div class="col-12">
                       <table id="example1" class="table table-bordered table-striped table-responsive">
                       <thead>
                           <tr>
                               <th>Codigo</th>
                               @foreach ($question as $questions)
                                   <th>{{ $questions }}</th>
                               @endforeach
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($results as $result)
                               <tr>
                                   <td>{{ $result->client_id }}</td>
                                   @foreach ($ids as $id)
                                       <td>{{ $result->{'pregunta' . $id} ?? '' }}</td>
                                   @endforeach
                               </tr>
                           @endforeach
                       </tbody>
                   </table>

               </div>
           </div>



       </div>


       <p></p>


       <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
           <img width="100%" src="https://cdn.pixabay.com/photo/2019/01/26/21/40/survey-3957027_1280.jpg" alt=""
               srcset="">
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

<script>
          function datatable_load() {
            $("#example1").DataTable({
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Busqueda avanzada : ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "info": true,
                "responsive": false,
                "autoWidth": false,
                "paging": true,
                "searching": true,
                "ordering": false,

                dom: 'Bfrtip',
                buttons: [

                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }, {

                        extend: 'csvHtml5',
                        text: 'CSV',
                        exportOptions: {
                            modifier: {
                                search: 'none'
                            }
                        }

                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        autoPrint: true
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copiar Datos',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'collection',
                        text: 'Mostrar Campos',
                        buttons: ['columnsVisibility'],
                        visibility: true
                    }


                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                // order: [
                //     [1, 'asc']
                // ]

            });
        }
        datatable_load();
</script>


