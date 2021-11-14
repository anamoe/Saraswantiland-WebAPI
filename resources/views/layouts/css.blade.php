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

<!-- CSS Files -->
<link rel="stylesheet" href="{{asset('public/template/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/template/assets/css/atlantis.min.css')}}">
<link rel="stylesheet" href="{{asset('public/template/assets/css/custom.css')}}">


@yield('css')