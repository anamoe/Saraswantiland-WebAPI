@extends('layouts.master')

@section('css')

@endsection
@section('content')


<div class="page-inner containermateri mt-4 d-block">
    <div class="row">
        <div class="col-md-12">
            <div class="px-3">
                <div class="card-header row">
                    <div class="col-md-12">
                        <span class="float-left" style="font-size: 24px;">Beranda Apps</span>
                        <button class="btn btn-sm btn-rounded btn-primary float-right" data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Beranda</button>
                    </div>
                </div>
            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Type</th>
                                <th>Foto Beranda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($b as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->judul}}</td>
                                <td>{{$p->type}}</td>
                                <td><img src="{{asset('public/beranda/'.$p->foto)}}" alt="..." style=" height:50px; width:70px;"></td>
                                <td>
                                    <!-- <a href="#" class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS" onclick="detail('{{$p->id}}','{{$p->judul_promo}}','{{$p->deskripsi_promo}}','{{asset('public/foto_promo/'.$p->foto_promo)}}')"><i class="fa fa-eye"></i></a> -->

                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$p->id}}','{{$p->judul}}','{{$p->type}}','{{asset('public/beranda/'.$p->foto)}}')"><i class="fa fa-edit"></i></a>

                                    <a href="#" onclick="hapus('{{$p->id}}','{{$p->judul_promo}}')" type="submit" class="btn-sm btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>

</div>





{{-- modal--}}

<div class="modal fade" id="ModalTambahSS" tabindex="-1" aria-labelledby="ModalTambahSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Beranda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('beranda')}}" method="post" id="buatberanda" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Beranda</label>
                        <div class="col-sm-9">
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="type" name="type" class="form-control"></textarea>
                        </div>
                    </div>

             

                       
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Beranda Apps</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('fotopromo').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="loadfoto" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfoto(this);" class="d-none" name="image2" accept="image/*"id="fotopromo"></input>

                    </div>
                           
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahBeranda()">Tambahkan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="ModalEditSS" tabindex="-1" aria-labelledby="ModalEditSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Beranda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="upberanda" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Beranda</label>
                        <div class="col-sm-9">
                            <input type="text" id="editjudul" name="judul" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="edittype" name="type" class="form-control"></textarea>
                        </div>
                    </div>

             

                       
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Beranda Apps</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('editfotopromos').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="editfoto" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfoto2(this);" class="d-none" name="image3" accept="image/*"id="editfotopromos"></input>

                    </div>
                           
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('upberanda').submit()">Perbaharui</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal detail -->
<div class="modal fade" id="ModalDetailSS" tabindex="-1" aria-labelledby="ModalDetailSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalDetailSSLabel">Detail Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="uppromo">
                    @csrf

                    <div class="text-center">
                        <img class="img" id="editfotopromo3" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfoto3(this);" class="d-none" name="image3" accept="image/*" id="uploadimagefileprofile3"></input>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Promo</label>
                        <div class="col-sm-9">
                            <input type="text" id="editpromo" name="judul" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Promo</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="editdeskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" role="dialog" aria-labelledby="editpaket" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="delete" method="post">
                    @method("delete")
                    @csrf
                </form>
                <span>Apakah Anda Mau menghapus <span class="map"></span> ?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="document.getElementById('delete').submit()">Hapus</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });


    $('#basic-datatables').DataTable({});

    function readURLfoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#loadfoto')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLfoto2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editfoto')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLfoto3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editfotopromo3')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function tambahBeranda() {
        $('#judul').removeClass('is-invalid')
        $('.invalidjudul').removeClass('d-none').removeClass('d-block').addClass('d-none')
        if ($('#judul').val() == "") {
            $('#judul').addClass('is-invalid')
        } else {
            $("#buatberanda").submit()
        }
    }

    function edit(id, judul, type, tumbnail) {
        $("#upberanda #editjudul").val(judul)
        $("#upberanda #edittype").val(type)
        $("#upberanda #editfoto").val(tumbnail)
        $('#editfoto').attr('src', tumbnail);

        $("#upberanda").attr("action", "{{url('beranda')}}" + "/" + id)
        $("#ModalEditSS").modal("show")
        console.log(tumbnail, id, judul, type)
    }

    function detail(id, promo, deskripsi, tumbnail) {
        $("#uppromo #editpromo").val(promo)
        $("#uppromo #editdeskripsi").val(deskripsi)
        $("#uppromo #editfotopromo3").val(tumbnail)
        $('#editfotopromo3').attr('src', tumbnail);

        $("#uppromo").attr("action", "{{url('beranda')}}" + "/" + id)
        $("#ModalDetailSS").modal("show")
        console.log(tumbnail, id, deskripsi, promo)
    }

    function hapus(id, promo) {
        $("#uppromo .map").html(promo)
        $("#delete").attr("action", "{{url('beranda')}}" + "/" + id)
        $("#hapus").modal("show")
    }
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection