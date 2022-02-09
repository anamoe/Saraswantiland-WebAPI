<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SARASWANTILAND</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('layouts.css')


</head>

<body>

    <br><br><br>

    <div class="page-inner containermateri mt--5 d-block">

        <div class="row">

            <div class="col-md-12">
                <div class="px-3">
                    <div class="card-header row">
                        <div class="col-md-12">
                            <span class="float-left" style="font-size: 24px;">Ikhtisar Perusahaan</span>


                        </div>

                    </div>
                    <div class="row listmateri card mx-2 py-3 mt-3">



                        @foreach($profil as $p)


                        <center>
                            <td><img src="{{asset('public/foto_profil/'.$p->foto)}}" alt="..." style=" height:150px; width:80%;"></td>
                        </center>


                        @endforeach



                    </div>


                    <div class="row listmateri card mx-2 py-3 mt-3">



                        @foreach($profil as $p)


                        <td>{{ $p->deskripsi == null ? "-" : (Illuminate\Support\Str::limit($p->deskripsi, 2000, $end='...')) }}</td>

                        @endforeach



                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-8 text-center"style=" height:150px; width:100%;">
                        {!! $profil[0]->iframe !!}
                    </div>
                    <div class="col-sm-4">
                        {!! $profil[0]->konten !!}
                    </div>
                </div>
                <hr>

            </div>

        </div>

    </div>

    </div>


    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">

            </nav>
            <div class="copyright ml-auto">
                <a href="/">SARASWANTILAND</a>
            </div>
        </div>
    </footer>
    </div>


    </div>

    @include('layouts.js')

</body>

</html>