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
                <a href="{{url('lantai')}}" type="submit"class="btn btn-sm btn-primary float-right " style="font-size: 14px;" ><i class="fas fa-arrow-circle-left">&nbsp Lantai</i></a>
                    <div class="col-md-12">
    

                        <span class="float-left" style="font-size: 24px;">Unit Perusahaan - Ruang Kamar</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
     
                        <button class="btn btn-sm btn-rounded btn-primary float-right" data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Ruang</button>
                   
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>


                            <tr>
                                <th>No.</th>
                                <th>No_Lantai</th>
                                <th>No_Ruangan</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Type</th>
                                <th>Luas</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ruang as $p)

                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->getlantai->nomor_lantai}}</td>
                                <td>{{$p->nomor_ruangan}}</td>
                                <td>{{$p->status}}</td>
                                <td>{{ $p->deskripsi == null ? "-" : (Illuminate\Support\Str::limit($p->deskripsi, 10, $end='...')) }}</td>
                                <td>{{$p->type}}</td>
                                <td>{{$p->luas}}</td>
                                <td>
                                    <a href="#" onclick="detail('{{$p->id}}','{{$p->status}}','{{$p->lantai_id}}','{{$p->nomor_ruangan}}','{{$p->deskripsi}}','{{$p->type}}','{{$p->luas}}','{{asset('public/foto_ruangan/'.$p->foto_ruangan)}}','{{$p->link_youtube}}')" class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$p->id}}','{{$p->status}}','{{$p->lantai_id}}','{{$p->nomor_ruangan}}','{{$p->deskripsi}}','{{$p->type}}','{{$p->luas}}','{{asset('public/foto_ruangan/'.$p->foto_ruangan)}}','{{$p->link_youtube}}')">


                                        <i class="fa fa-edit"></i></a>
                                    <a href="#" onclick="hapus('{{$p->id}}','{{$p->nomor_ruangan}}')" class="btn-sm btn-danger" data-target="confirmation-modal"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('ruang')}}" method="post" id="buatruang" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_ruang" name="nomor_ruangan" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="open">open</option>
                                <option value="sold">sold</option>
                                <option value="hold">hold</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <input type="text" id="type" name="type" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Luas</label>
                        <div class="col-sm-9">
                            <input type="number" id="type" name="luas" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label class="col-sm-3 col-form-label">Lantai Id</label> -->
                        <div class="col-sm-9">
                            <input type="hidden" id="type" value={{$id}} name="lantai_id" class="form-control">
                        </div>
                    </div>

                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Ruang</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Link Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" id="link_youtube"  name="link_youtube" class="form-control">
                        </div>
                    </div>





                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahRuang()">Tambahkan</button>
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
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" method="post" id="upruang">
                    @method('PUT')
                    @csrf

                           
                 
                        <!-- <div class="form-group form-inline text-center">
                                <img class="img" id="editruang" src="" alt="Foto Thumbnail" style=" height:70%; width:70%;">
                                <i data-toggle="modal" data-target="#upfotoprofil" class="fa fa-edit text-primary" onclick="document.getElementById('uploadimagefileprofile5').click()" style="cursor:pointer;">Upload Thumbnail</i>
                                <input type="file" onchange="readURLfotoedit(this);" class="d-none" name="image3" accept="image/*" id="uploadimagefileprofile5"></input>
                        </div>
                     -->
                   

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="enomor_ruang" name="nomor_ruangan" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Lantai</label>
                        <div class="col-sm-9">
                            <input type="text" id="elantai_id" name="lantai_id" class="form-control">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="estatus" name="status" class="form-control">
                                <option value="sold">sold</option>
                                <option value="hold">hold</option>
                                <option value="open">open</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="edeskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <input type="text" id="etype" name="type" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Luas</label>
                        <div class="col-sm-9">
                            <input type="text" id="eluas" name="luas" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Link Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" id="elink_youtube"  name="link_youtube" class="form-control">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Beranda Apps</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('foto').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="editruang" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotoedit(this);" class="d-none" name="image3" accept="image/*"id="foto"></input>

                    </div>
                           
                        </div>
                    </div>





                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('upruang').submit()">Perbaharui</button>
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
                <h5 class="modal-title" id="ModalDetailSSLabel">Detail Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="druang">
                    @csrf

                    <div class="text-center">
                        <img class="img" id="dfotoruang" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">
                       

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="enomor_ruang" name="nomor_ruang"  class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" disabled class="form-control">
                                <option value="open">open</option>
                                <option value="hold">hold</option>
                                <option value="sold">sold</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="edeskripsi" name="deskripsi" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <input type="text" id="etype" name="type" class="form-control " disabled>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Luas</label>
                        <div class="col-sm-9">
                            <input type="text" id="eluas" name="luas" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Link Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" id="elink_youtube"  name="link_youtube" disabled class="form-control">
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

    
    function tambahRuang() {
        $('#ruang').removeClass('is-invalid')
        $('.invalidruang').removeClass('d-none').removeClass('d-block').addClass('d-none')
        if ($('#nruang').val() == "") {
            $('#ruang').addClass('is-invalid')
        } else {
            $("#buatruang").submit()
        }
    }

    function edit(id, status, lantai, ruang, deskripsi, type, luas,tumbnail,youtube) {
        $("#upruang #estatus").val(status)
        $("#upruang #elantai_id").val(lantai)
        $("#upruang #etype").val(type)
        $("#upruang #eluas").val(luas)
        $("#upruang #edeskripsi").val(deskripsi)
        $("#upruang #enomor_ruang").val(ruang)
        $("#upruang #editruang").val(tumbnail)
        $('#editruang').attr('src', tumbnail);

        $("#upruang #elink_youtube").val(youtube)
        $("#upruang").attr("action", "{{url('ruang')}}" + "/" + id)
        $("ModalEditSS").modal("show")
        console.log(status, id, lantai, ruang,deskripsi,type,tumbnail)
    }

    
    function detail(id, status, lantai, ruang, deskripsi, type, luas,tumbnail,youtube) {
        $("#druang #estatus").val(status)
        $("#druang #elantai_id").val(lantai)
        $("#druang #etype").val(type)
        $("#druang #eluas").val(luas)
        $("#druang #edeskripsi").val(deskripsi)
        $("#druang #enomor_ruang").val(ruang)
        $("#druang #elink_youtube").val(youtube)
        $("#druang #dfotoruang").val(tumbnail)
        $('#dfotoruang').attr('src', tumbnail);
        $("ModalDetailSS").modal("show")
        console.log(status, id, lantai, ruang,deskripsi,type,tumbnail)
    }

    function hapus(id, ruang) {
        $("#upruang .map").html(ruang)
        $("#delete").attr("action", "{{url('ruang')}}" + "/" + id)
        $("#hapus").modal("show")
    }

    function readURLfotoedit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editruang')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    

    function readURLfotodetail(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#dfotoruang')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection