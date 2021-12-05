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
                        <span class="float-left" style="font-size: 24px;">Unit Perusahaan - Lantai</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
                        <button class="btn btn-sm btn-rounded btn-primary float-right" data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Lantai</button>
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>


                            <tr>
                                <th>No.</th>
                                <th>No Lantai</th>
                                <th>Foto Lantai</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lantai as $p)

                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{url('ruang/'.$p->id)}}">{{$p->nomor_lantai}}</a></td>
                                <td><img src="{{asset('public/foto_lantai/'.$p->foto_lantai)}}" alt="..." style=" height:50px; width:70px;"></td>
                                <td>{{$p->status}}</td>
                                <td>
                                    <!-- <a href="" class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS"><i class="fa fa-eye"></i></a> -->
                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$p->id}}','{{$p->status}}','{{$p->nomor_lantai}}','{{asset('public/foto_lantai/'.$p->foto_lantai)}}')"><i class="fa fa-edit"></i></a>
                                    <a href="#" onclick="hapus('{{$p->id}}','{{$p->nomor_lantai}}')" class="btn-sm btn-danger" data-target="confirmation-modal"><i class="fa fa-trash"></i></a>


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
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Lantai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('lantai')}}" method="post" id="buatlantai" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Lantai</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_lantai" name="nomor_lantai" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Lantai</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="open">open</option>
                                <option value="sold">sold</option>
                                <option value="hold">hold</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Lantai</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('foto').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                                <img class="img" id="foto_lantai" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                                <input type="file" onchange="readURLfototambah(this);" class="d-none" name="imagelantai" accept="image/*" id="foto"></input>

                            </div>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Jumlah Ruangan</label>
                        <div class="col-sm-3">
                            <input type="number" id="jlantai" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" id="masukanlantai" class="btn btn-sm btn-primary">Oke</button>
                        </div>
                    </div>

                    <div id="conlantai">

                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="buat()">Tambahkan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="ModalEditSS" tabindex="-1" aria-labelledby="ModalEditSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Lantai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="uplantai" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Lantai</label>
                        <div class="col-sm-9">
                            <input type="text" id="enomor" name="nomor_lantai" class="form-control">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Lantai</label>
                        <div class="col-sm-9">
                            <select type="text" id="estatus" name="status" class="form-control">
                                <option value="open">open</option>
                                <option value="hold">hold</option>
                                <option value="sold">sold</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('foto2').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="editlantai" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotoedit(this);" class="d-none" name="image3" accept="image/*" id="foto2"></input>

                    </div>
                           
                        </div>
                    </div>
               


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('uplantai').submit()">Perbaharui</button>
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
                <h5 class="modal-title" id="ModalDetailSSLabel">Detail Lantai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor lantai</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_ruang" name="nomor_ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Lantai</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>
                                <option value="">1</option>
                            </select>
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

    function buat() {
        $('#nomor_lantai').removeClass('is-invalid')
        $('.invalidlantai').removeClass('d-none').removeClass('d-block').addClass('d-none')
        if ($('#nomor_lantai').val() == "") {
            $('#nomor_lantai').addClass('is-invalid')
        } else {
            $("#buatlantai").submit()
        }


    }

    function edit(id, status, lantai, tumbnail) {
        $("#uplantai #estatus").val(status)
        $("#uplantai #enomor").val(lantai)
        $("#uplantai #editlantai").val(tumbnail)
        $('#editlantai').attr('src', tumbnail);

        $("#uplantai").attr("action", "{{url('lantai')}}" + "/" + id)
        $("ModalEditSS").modal("show")
        console.log(status, id, lantai, tumbnail)
    }

    function readURLfototambah(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#foto_lantai')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLfotoedit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editlantai')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function readURLfotodetail(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#dlantai')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function hapus(id, ruang) {
        $("#uplantai .map").html(ruang)
        $("#delete").attr("action", "{{url('lantai')}}" + "/" + id)
        $("#hapus").modal("show")
    }
    $('#basic-datatables').DataTable({});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
    $("#masukanlantai").on('click', () => {
        var jml = $("#jlantai").val()
        $("#conlantai").empty()
        for (let i = 1; i <= jml; i++) {
            $("#conlantai").append(`
            <div class="card-body bg-primary containerlantai">
                        <span class="badge badge-secondary">${i}</span>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Nomor Ruangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor_ruangan[]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_ruangan[]">
                                    <option value="open">Open</option>
                                    <option value="Hold">Hold</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Type</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="type[]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Luas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="luas[]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi[]"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-white">Link Youtube</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="link_youtube[]"></textarea>
                            </div>
                        </div>

                    </div>
                 
                    
            `)
        }

    })
</script>


@endsection