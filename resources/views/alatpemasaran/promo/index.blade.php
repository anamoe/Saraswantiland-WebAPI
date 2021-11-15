@extends('layouts.master')

@section('content')


<div class="row mb-3">

    <div class="col-xl-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Promo</h6>
               
                <a class="m-0 float-right btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#ModalTambahSS">Tambah Promo <i class="fas fa-plus"></i></a>
             
            </div>
           
            <div class="table-responsive">
               
                    <table class="table align-items-center table-flush  " id="datassall" >
                      
                        <thead class="thead-light">


                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Foto_Slideshow</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promo as $p)

                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->judul_promo}}</td>
                                <td>{{$p->deskripsi_promo}}</td>
                                <td>{{$p->foto_promo}}</td>
                                <td>
                                <a href="" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger" data-target="confirmation-modal">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-success text-white">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                </td>

                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

</div>




    {{-- modal--}}

    <div class="modal fade" id="ModalTambahSS" tabindex="-1" aria-labelledby="ModalTambahSSLabel" aria-hidden="true">
<div id="loader" ></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addss">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Promo</label>
                        <div class="col-sm-9">
                            <input type="text" id="judul" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Promo</label>
                        <div class="col-sm-9">
                            <textarea type="text" id="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Promo</label>
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('uploadimagefileposting').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <img id="img-uploadposting" src='' alt="" class="img-uploadposting d-none w-100" onclick="document.getElementById('uploadimagefileposting').click()">
                            <input type="file" onchange="readURLfotoposting(this);" class="d-none" name="foto_slideshow" accept="image/*" id="uploadimagefileposting"></input>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="tambahkanss">Tambahkan</button>
                <button type="button" aidi_ss="" class="btn btn-primary" id="editkanss">Perbaharui</button>
            </div>
        </div>
    </div>
</div>

    

@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {
        $('.datassall').DataTable();
    });
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection