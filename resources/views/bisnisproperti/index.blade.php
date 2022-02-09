@extends('layouts.master')

@section('css')

@endsection
@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->

<div class="page-inner containermateri mt-4 d-block">

    <div class="row">

        <div class="col-md-12">
            <div class="px-3">
                <div class="card-header row">
                    <div class="col-md-12">
                        <span class="float-left" style="font-size: 24px;">Bisnis Properti</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
                        <button class="btn btn-sm btn-rounded btn-primary float-right" data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Data</button>
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>


                            <tr>
                                <th>No.</th>
                                <th>Foto Bisnis Properti</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($b as $p)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('public/bisnisproperti/'.$p->foto)}}" alt="..." style=" height:50px; width:70px;"></td>
                                <td>
                                    <a href="#"  onclick="detail('{{$p->id}}','{{asset('public/bisnisproperti/'.$p->foto)}}')"class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS"><i class="fa fa-eye"></i></a>
                                    <a href="#"onclick="edit('{{$p->id}}','{{asset('public/bisnisproperti/'.$p->foto)}}')" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS"><i class="fa fa-edit"></i></a>
                                    <a href="#" onclick="hapus('{{$p->id}}')"class="btn-sm btn-danger" data-target="confirmation-modal"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Foto Bisnis Properti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('bisnis')}}" method="post" id="tambahfotogedung" enctype="multipart/form-data">
                    @csrf

                    <!-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Bisnis Properti</label>
                        <div class="col-sm-9">

                            <div class="form-group form-inline">
                                <img class="img" id="loadfoto" src="" alt="Foto Thumbnail" style=" height:100px; width:100px;">
                                <i data-toggle="modal" data-target="#upfotoprofil" class="fa fa-edit text-primary" onclick="document.getElementById('uploadimagefileprofile').click()" style="cursor:pointer;">Upload Thumbnail</i>
                                <input type="file" onchange="readURLfotopost(this);" class="d-none" name="image" accept="image/*" id="uploadimagefileprofile"></input>
                            </div>

                        </div>
                    </div> -->

                    
                    <div class="form-group row">
                        <!-- <label class="col-sm-3 col-form-label">Foto Beranda Apps</label> -->
                        <div class="col-sm-12">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('fotox').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="loadfoto" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotopost(this);" class="d-none" name="image" accept="image/*"id="fotox"></input>

                    </div>
                           
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahFotoGedung()">Tambahkan</button>
            </div>
        </div>
    </div>
</div>


<!-- modal edit -->

<div class="modal fade" id="ModalEditSS" tabindex="-1" aria-labelledby="ModalTEditSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="upgedung" enctype="multipart/form-data">

                @method("patch")
                    @csrf
                 
                   
                    <!-- <div class="form-group row">
                      
                        <div class="col-sm-9">

                        
                        <div class="form-group form-inline text-center">
                                <img class="img" id="editgedung" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">
                                <i data-toggle="modal" data-target="#upfotoprofil" class="fa fa-edit text-primary" onclick="document.getElementById('uploadimagefileprofile5').click()" style="cursor:pointer;">Upload Thumbnail</i>
                                <input type="file" onchange="readURLfoto(this);" class="d-none" name="image3" accept="image/*" id="uploadimagefileprofile5"></input>
                        </div>

                    </div>
                    </div> -->

                    <div class="form-group row">
                        <!-- <label class="col-sm-3 col-form-label">Foto Beranda Apps</label> -->
                        <div class="col-sm-12">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('foto').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="editgedung" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfoto(this);" class="d-none" name="image3" accept="image/*"id="foto"></input>

                    </div>
                           
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('upgedung').submit()">Perbaharui</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="ModalDetailSS" tabindex="-1" aria-labelledby="ModalDetailSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="detgedung">
                    @csrf

                    <div class="text-center">
                    <img class="img" id="gedung" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                         <input type="file" onchange="readURLfoto3(this);" class="d-none" accept="image/*" id="uploadimagefileprofile3"></input>

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


    function readURLfoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editgedung')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLfoto3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#gedung')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLfotopost(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#loadfoto')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function tambahFotoGedung() {
        $('#judul').removeClass('is-invalid')
        $('.invalidgedung').removeClass('d-none').removeClass('d-block').addClass('d-none')
       
            $("#tambahfotogedung").submit()
        
    }

    function detail(id,tumbnail) {
        
        $("#detgedung #gedung").val(tumbnail)
        $('#gedung').attr('src', tumbnail);

        $("#ModalDetailSS").modal("show")
        console.log(tumbnail,id)
    }

    
    function edit(id,tumbnail) {
        $("#upgedung #editgedung").val(tumbnail)
        $('#editgedung').attr('src', tumbnail);
 
        $("#upgedung").attr("action","{{url('bisnis')}}"+"/"+id)
        $("#ModalEditSS").modal("show")
        console.log(tumbnail,id)
    }
    function hapus(id) {
      
        $("#delete").attr("action","{{url('bisnis')}}"+"/"+id)
        $("#hapus").modal("show")
    }

    $('#basic-datatables').DataTable({});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection