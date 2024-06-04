<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>| FINGAL MEMORIALS LTD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- font awesome CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- Notika icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/notika-custom-icon.css') }}">
    <!-- wave CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/wave/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/wave/button.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Data Table JS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <!-- bootstrap select CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen/chosen.css') }}">
    <!-- datapicker CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/datapicker/datepicker3.css') }}">
    <!-- summernote CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/summernote/summernote.css')}}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- modernizr JS
  ============================================ -->

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert JS
  ============================================ -->


    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style media="all">
        @font-face {
            font-family: 'notika-icon';
            src: url('{{ asset('assets/fonts/notika-icon.eot?qzfrsz') }}');
            src: url('{{ asset('assets/fonts/notika-icon.eot?qzfrsz#iefix') }}') format('embedded-opentype'),
                url('{{ asset('assets/fonts/notika-icon.ttf?qzfrsz') }}') format('truetype'),
                url('{{ asset('assets/fonts/notika-icon.woff?qzfrsz') }}') format('woff'),
                url('{{ asset('assets/fonts/notika-icon.svg?qzfrsz#notika-icon') }}') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .bootstrap-select>.btn-default:before,
        .chosen-select-act:before {
            background-image: url("{{ asset('assets/images/select.png') }}");
        }

        .chosen-container-single .chosen-search input[type="text"] {
            background: white url("{{ asset('assets/img/chosen-sprite.png') }}") no-repeat 100% -20px;
            background: url("{{ asset('assets/img/chosen-sprite.png') }}") no-repeat 100% -45px;
        }

        .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
            background: url("{{ asset('assets/img/chosen-sprite.png') }}") -38px 1px no-repeat;
        }

        .icheckbox_square-green,
        .iradio_square-green {
            background: url("{{ asset('assets/img/green1.png') }}") no-repeat;
        }
    </style>
</head>
