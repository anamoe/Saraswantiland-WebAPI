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
                        <span class="float-left" style="font-size: 24px;">Unit Perusahaan</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
                        <button class="btn btn-sm btn-rounded btn-primary float-right"  data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Ruang</button>
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>


                            <tr>
                                <th>No.</th>
                                <th>No_Ruangan</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ruang as $p)

                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td><a href="">{{$p->nomor_ruangan}}</a></td>
                                <td>{{$p->status}}</td>
                                <td>{{$p->deskripsi}}</td>
                                <td>
                                <a href="" class="btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalDetailSS"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" ><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn-sm btn-danger" data-target="confirmation-modal"><i class="fa fa-trash"></i></a>
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
<div id="loader" ></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_ruang" name="nomor_ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>
                                <option value="">1</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fasilitas Ruang</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="fasilitas" name="fasilitas" class="form-control"></textarea>
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
<div id="loader" ></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_ruang" name="nomor_ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>
                                <option value="">1</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fasilitas Ruang</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="fasilitas" name="fasilitas" class="form-control"></textarea>
                        </div>
                    </div>

                    


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="editss">Perbaharui</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="ModalDetailSS" tabindex="-1" aria-labelledby="ModalDetailSSLabel" aria-hidden="true">
<div id="loader" ></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalDetailSSLabel">Detail Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Ruang</label>
                        <div class="col-sm-9">
                            <input type="text" id="nomor_ruang" name="nomor_ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Ruang</label>
                        <div class="col-sm-9">
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>
                                <option value="">1</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fasilitas Ruang</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="fasilitas" name="fasilitas" class="form-control"></textarea>
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
    

@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {
        $('#datassall').DataTable();
    });

    $('#basic-datatables').DataTable({});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection