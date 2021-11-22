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
                        <span class="float-left" style="font-size: 24px;">Tagline Perusahaan</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
                        <!-- <button class="btn btn-sm btn-rounded btn-warning float-right"  data-toggle="modal" data-target="#ModalEditSS"><i class="fas fa-edit"> </i> Edit Tagline</button>
                        <button class="btn btn-sm btn-rounded btn-primary float-right"  data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Tagline</button> -->
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>


                            <tr>
                                
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Type</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tagline as $p)
                            <tr>

                           
                                <td>{{$p->judul}}</td>
                                <td>{{ $p->deskripsi == null ? "-" : (Illuminate\Support\Str::limit($p->deskripsi, 30, $end='...')) }}</td>
                                <td>{{$p->type}}</td>
                                <td>
                                    <!-- <a href="" class="btn-sm btn-success text-white" ><i class="fa fa-eye"></i></a> -->

                                    <!-- <a href="#"  class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalEditSS" 
                                onclick="detail('{{$p->id}}','{{$p->judul}}','{{$p->deskripsi}}')" ><i class="fa fa-eye"></i></a> -->

                                <a href="{{url('get-tagline')}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>



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
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Tagline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Tagline</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" id="jutypedul" name="type" value="Tagline" disabled class="form-control">

                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="tambahkanss">Tambahkan</button>
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
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Tagline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="uptagline">
                    @method("post")
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" id="ejudul" name="judul" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Tagline</label>
                        <div class="col-sm-9">
                            <textarea id="edeskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" id="" name="type" value="Tagline" disabled class="form-control">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('uptagline').submit()">Perbaharui</button>
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
    // $('#basic-datatables').DataTable({});


    function edit(id, judul, deskripsi) {
        $("#uptagline #ejudul").val(judul)
        $("#uptagline #edeskripsi").val(deskripsi)

        $("#uptagline").attr("action", "{{url('update-tagline')}}" + "/" + id)
        $("ModalEditSS").modal("show")
        console.log(judul, id)
    }
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection