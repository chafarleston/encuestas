<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>SDC - Encuesta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}  ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <script src="{{ asset('linkedin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('certification.js') }}"></script>
    <script src="{{ asset('axios.min.js') }}"></script>
    <script src="{{ asset('function.js') }}"></script>
    <script src="{{ asset('survey_client.js') }}"></script>
    <script src="{{ asset('client.js') }}"></script>
    <script src="{{ asset('associate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    {{ session('success') }}

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
</head>

<body class="pos-relative" style="background-color: #e5e5e5">
    <nav class="navbar navbar-expand-md  shadow-sm"style="background-color: #bf0909">
        <div class="row">
            <div class="col col-lg-6">
                <a class="navbar-brand" href="{{ url('/') }}">
                    &nbsp;
                     &nbsp;
                      &nbsp;
                       &nbsp;
                    <img class="img-blanca"
                        src="https://www.gob.pe/assets/escudo_text_gobpe_bicentenario_black-dd0b8b3ea9c67a76fb0c05196563a20f2900ebd82b09507312ce401c4610aa46.svg"
                        alt="" width="150">&nbsp;&nbsp;
                        <span style="font-size: 13px;color:white">Plataforma digital única del Estado Peruano</span>
                        
                </a>
<style>
    .img-blanca {
    filter: invert(100%);
}
</style>
            </div>
            <div class="col col-lg-4">

            </div>

            <div class="col col-lg-4" style="justify-content: center; align-items: center; display: flex;">
                {{-- <img src="{{ asset('CERRAR-SESION-BLANCO.png') }}" alt="" width="10%"> --}}
                {{-- <a class="text-blue" href="{{ route('logout') }}" style="color: white;">Cerrar Sesión</a> --}}
            </div>

        </div>
    </nav>

    <p></p>


    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <p></p>
                {{-- <h2 style="color:#042d89;text-align:left"><b>{{ $survey->description }}</b></h2> --}}

                <div id="mycontent">

                    @include('survey_clienttable')
                </div>
            </div>
            <div class="col-lg-1">
            </div>
            {{-- <div class="col-lg-3">
             <p>
                &nbsp;
            </p>
            <p>
                &nbsp;
            </p>
           
        </div> --}}
        </div>
    </div>



    <p>
        &nbsp;
    </p>
    <p class="container" style="text-align:justify">
        {{-- {{ $survey->detail }} --}}
    </p>


    <p>
        &nbsp;
        &nbsp;
    </p>
    <p>
        &nbsp;
        &nbsp;
    </p>






    {{-- <footer class="" style="background-color:#003399;color:white">



        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Descripción a la izquierda -->
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                    <h3><b>SDC RESEARCH</b> </h3>
                    <p></p>
                    <p class="text-justify">
                        Somos la marca relacionada a servicios de investigación de mercados y opinión pública para Perú y Latinoamerica. Nuestros servicios generan y analizan datos entorno a personas, consumidores y mercados; ayudando a la toma de decisiones estratégicas basadas en datos.
                    </p>
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                    <span
                        style="background-image: linear-gradient(45deg, rgb(255, 0, 149), red); -webkit-background-clip: text; color: transparent;">
                        <a href="https://anthonycode.com"target="_blank">Copyright © 2023 Dev. AnthonyCode</a></span>
                </div>
                <div class="col-lg-4 text-center">
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                    <!-- Enlaces en el centro -->
                    <a href="#">Nosotros</a> |
                    <a href="#">Cursos</a> |
                    <a href="#">Política de Privacidad</a>
                </div>
                <div class="col-lg-4 text-right">
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsdc.research.survey&tabs=timeline&width=500&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=859285638195545" width="500" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>


        </div>
    <p>
                        &nbsp;
                        &nbsp;
                    </p>
    </footer> --}}
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
    <p>&nbsp;
        &nbsp;
    </p>
     <p>&nbsp;
        &nbsp;
    </p>
     <p>&nbsp;
        &nbsp;
    </p>
     <p>&nbsp;
        &nbsp;
    </p>
    <footer class="footer" style="background-color:rgb(32, 32, 32);color:white">
        &nbsp;
    </footer>

</body>
