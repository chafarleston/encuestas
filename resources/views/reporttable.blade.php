  
           <!--  USO DE DATATABLE PARA GENERAR PDF - CSV  -->
           <link rel="stylesheet" type="text/css"
               href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-html5-1.6.4/b-print-1.6.4/sl-1.3.1/datatables.min.css" />

           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
           <script type="text/javascript"
               src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-html5-1.6.4/b-print-1.6.4/sl-1.3.1/datatables.min.js">
           </script>


                   <table id="example1" class="table table-bordered table-striped table-responsive">
                       <thead>
                           <tr>
                               <th>Codigo</th>
                               @foreach ($question as $questions)
                                   <th>{{ $questions }}</th>
                               @endforeach
                               <th>Fecha</th>
                             <th ><img width="20" src="https://img1.freepng.es/20180622/aac/kisspng-computer-icons-download-share-icon-nut-vector-5b2d36055f5105.9823437615296896053904.jpg" alt="" srcset=""></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($results as $result)
                               <tr>
                                   <td>{{ $result->client_id }}</td>

                                   @foreach ($ids as $id)
                                       <td>{{ $result->{'pregunta' . $id} ?? '' }}</td>
                                   @endforeach

                                   @foreach ($ids as $id)
                                       @if ($loop->first)
                                           <td>{{ $result->{'updated_at' . $id} ?? '' }}</td>
                                       @endif
                                   @endforeach
                                   <td>
                                    <form name="report" id="report">
                                        @csrf
                                        <button class="btn btn-danger note-icon-trash" onclick="reportDestroy('{{ $result->client_id }}'); return false"></button>
                                    </form>
                                       <!-- <button class="note-icon-pencil" ></button> -->
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>





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
