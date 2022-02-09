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
                        <span class="float-left" style="font-size: 24px;">Unit Tipe </span>
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
                                <th>Nama Unit</th>
                            
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unit as $p)

                            <tr>


                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama_unit}}</td>
                               
                                <td>
                                    <a href="#" onclick="detail('{{$p->id}}','{{$p->nama_unit}}','{{asset('public/foto_denah/'.$p->foto_denah)}}','{{asset('public/foto_lantai/'.$p->foto_unit)}}')" 
                                    class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS"><i class="fa fa-eye"></i></a>


                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$p->id}}',
                                    '{{$p->nama_unit}}','{{asset('public/foto_denah/'.$p->foto_denah)}}','{{asset('public/foto_unit/'.$p->foto_unit)}}')">





                                        <i class="fa fa-edit"></i></a>
                                    <a href="#" onclick="hapus('{{$p->id}}','{{$p->nama_unit}}')" class="btn-sm btn-danger" data-target="confirmation-modal"><i class="fa fa-trash"></i></a>
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
                <form action="{{url('unit')}}" method="post" id="buatruang" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Unit</label>
                        <div class="col-sm-9">
                            <input type="text" id="l" name="nama_unit" class="form-control">
                        </div>
                    </div>
            

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Unit</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('fotoss').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="fotoruang" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotoadd(this);" class="d-none" name="image2" accept="image/*"id="fotoss"></input>

                    </div>
                           
                        </div>
                    </div>
                    
                    
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Denah </label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting2">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('fotoss2').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="fotoruang2" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotoadd2(this);" class="d-none" name="image3" accept="image/*"id="fotoss2"></input>

                    </div>
                           
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
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" method="post" id="upruang">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Unit</label>
                        <div class="col-sm-9">
                            <input type="text" id="eunit" name="nama_unit" class="form-control">
                        </div>
                    </div>
            



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Unit</label>
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
                    
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Denah</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting2">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('foto2').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="editruang2" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfotoedit2(this);" class="d-none" name="image4" accept="image/*"id="foto2"></input>

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
                    
                     <div class="text-center">
                        <img class="img" id="dfotoruang2" src="" alt="Foto Thumbnail" style=" height:50%; width:50%;">
                       

                    </div>
                  
                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Unit </label>
                        <div class="col-sm-9">
                            <input type="text" id="dunit" name="nama_unit" class="form-control">
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

  
    function edit(id, unit,tumbnail,tumbnail2) {
        $("#upruang #eunit").val(unit)
      
        $("#upruang #editruang").val(tumbnail)
        $('#editruang').attr('src', tumbnail)
        
          $("#upruang #editruang2").val(tumbnail2)
        $('#editruang2').attr('src', tumbnail2)
 
        $("#upruang").attr("action", "{{url('unit')}}" + "/" + id)
        $("ModalEditSS").modal("show")
        console.log(id, unit,tumbnail,tumbnail2);
    }

    
    function detail(id, unit,tumbnail,tumbnail2) {
        $("#druang #dunit").val(unit)

        $("#druang #dfotoruang").val(tumbnail)
        $('#dfotoruang').attr('src', tumbnail)
        
         $("#druang #dfotoruang2").val(tumbnail2)
        $('#dfotoruang2').attr('src', tumbnail2)
    
        $("ModalDetailSS").modal("show")
      console.log(id, unit,tumbnail,tumbnail2)
    }

    function hapus(id, ruang) {
        $("#upruang .map").html(ruang)
        $("#delete").attr("action", "{{url('unit')}}" + "/" + id)
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
    
     function readURLfotoedit2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editruang2')
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
        function readURLfotodetail2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#dfotoruang2')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
 
    function readURLfotoadd(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#fotoruang')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
        function readURLfotoadd2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#fotoruang2')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
  
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection