<!--<link rel="icon" href="{{asset('public/template/assets/img/icon.ico')}}" type="image/x-icon"/>-->
<link rel="icon" href="{{asset('public/icon/logo.png')}}" type="image/x-icon"/>


<!-- Fonts and icons -->
<script src="{{asset('public/template/assets/js/plugin/webfont/webfont.min.js')}}"></script>
<script>
    WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("public/template/assets/css/fonts.min.css")}}']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk77TfuPCTmAYFGMB2sF27Tb3LhJYHt7Q&libraries=places"></script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{asset('public/template/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/template/assets/css/atlantis.min.css')}}">
<link rel="stylesheet" href="{{asset('public/template/assets/css/custom.css')}}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/template/assets/css/summernote-audio.css')}}">

<style>
    .modal-dialog{
        max-width:1000px;
    }
    .note-group-select-from-files{
        display: none;
    }



    .imagemedia img{
        cursor:pointer;
    }
</style>
@yield('css')