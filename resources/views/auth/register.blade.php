<!DOCTYPE html>
<head>
<link rel="icon" href="{{asset('public/icon/logo.png')}}" type="image/x-icon"/>
<link rel="stylesheet" href="{{asset('public/css/csslogin.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>


</style>
</head>

<body style="background-color: #1597E5;">

@if(session()->has('message'))
    <div class="notif col-10 col-xs-11 col-sm-4 alert alert-success d-block" role="alert" id="notif">
        <button type="button" class="close" onclick="document.getElementById('notif').classList.remove('d-block')">×</button>
        <span data-notify="icon" class="fa fa-bell"></span>
        <span data-notify="title">Success</span> <br>
        <span data-notify="message">Berhasil Mendaftar</span>
    </div>
    @endif
    @if(session()->has('error'))
    <div  class="notif col-10 col-xs-11 col-sm-4 alert alert-danger d-block" role="alert" id="notif">
        <button type="button" class="close" onclick="document.getElementById('notif').classList.remove('d-block')">×</button>
        <span data-notify="icon" class="fa fa-bell"></span> 
        <span data-notify="title">Gagal</span> <br>
        <span data-notify="message">{{session()->get('error')}}</span>
    </div>
    @endif
    
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="{{asset('public/icon/vvv.png')}}" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    
                    <br><br>
                    <form action="{{route('register')}}" method="post" class="login-form">
                                @csrf
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Name</h6>
                        </label> <input class="mb-4" type="text" id="name" name="name" placeholder="Nama"> 
                        </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> <input class="mb-4" type="text" name="email" placeholder="Email"> 
                        </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password" id="password1" placeholder=" password"> 
                        </div><br>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Repeat Password</h6>
                        </label> <input type="password" name="konfirmasi_password" id="password2" placeholder="Konfirmasi password"> 
                        </div>
                    <br>
                    <div class="row mb-3 px-3"> <button type="submit" href="{{route('register')}}"class="btn btn-primary text-center">Login</button> </div>
                    <!-- <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div> -->
                    </form>
                    <!-- <div class="row mb-3 px-3"> <button type="submit" class="btn btn-primary text-center">Register</button> </div> -->
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Have an account? <a class="text-danger ">Login</a></small> </div>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; SARASWANTILAND</small>
                <!-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm">

                </span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm">

                </span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> -->
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

$(document).ready(function() {

@if(session()->has('message'))
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: "{{session()->get('message')}}",
})
@endif


});

 
</script>