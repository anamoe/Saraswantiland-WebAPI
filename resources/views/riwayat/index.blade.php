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
                        <span class="float-left" style="font-size: 24px;">Riwayat Pemesanan</span>
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
                                <th>Nama Pemesan</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($r as $p)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama_pemesan}}</td>
                                <td>{{$p->no_telp}}</td>
                                <td>
                                     <!-- <a href="#" class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS" onclick="detail('{{$p->id}}','{{$p->judul_promo}}','{{$p->deskripsi_promo}}','{{asset('public/foto_promo/'.$p->foto_promo)}}')"><i class="fa fa-eye"></i></a> -->

                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$p->id}}','{{$p->nama_pemesan}}','{{$p->no_telp}}')"><i class="fa fa-edit"></i></a> 

                                    <a href="#" onclick="hapus('{{$p->id}}','{{$p->nama_pemesan}}')" type="submit" class="btn-sm btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>


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
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Riwayat Pemesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('add-riwayat')}}" method="post" id="buatpromo" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Telp/HP</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="no_telp" name="no_telp" class="form-control"></textarea>
                        </div>
                    </div>
                            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahPromo()">Tambahkan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditSS" tabindex="-1" aria-labelledby="ModalEditSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="uppromo" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-9">
                            <input type="text" id="enama_pemesan" name="nama_pemesan" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Telp/HP</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="eno_telp" name="no_telp" class="form-control"></textarea>
                        </div>
                    </div>

                 


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('uppromo').submit()">Perbaharui</button>
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

    function tambahPromo() {
        // $('#nama_pemesan').removeClass('is-invalid')
        // $('.invalidjudul').removeClass('d-none').removeClass('d-block').addClass('d-none')
        if ($('#nama_pemesan').val() == "") {
            $('#nama_pemesan').addClass('is-invalid')
        } 
        if ($('#no_telp').val() == "") {
            $('#no_telp').addClass('is-invalid')
        } 
        
        else {
            $("#buatpromo").submit()
        }
    }
    function edit(id, promo, deskripsi, tumbnail) {
        $("#uppromo #enama_pemesan").val(promo)
        $("#uppromo #eno_telp").val(deskripsi)

        $("#uppromo").attr("action", "{{url('up-riwayat')}}" + "/" + id)
        $("#ModalEditSS").modal("show")
        console.log(tumbnail, id, deskripsi, promo)
    }
    function hapus(id, promo) {
        $("#uppromo .map").html(promo)
        $("#delete").attr("action", "{{url('del-riwayat')}}" + "/" + id)
        $("#hapus").modal("show")
    }

    $('#basic-datatables').DataTable({});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>




@endsection