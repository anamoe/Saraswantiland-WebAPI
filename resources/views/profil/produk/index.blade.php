@extends('layouts.master')


@section('css')




@endsection

@section('content')

<br><br><br>



                     <!-- Modal -->
                     <div class="modal fade" id="editMapel" role="dialog" aria-labelledby="editMapel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Produk Perusahaan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="updatemapel" method="post">
                                    @method("patch")
                                    @csrf
                                    <div class="form-group form-inline">
                                        <label for="namamapel" class="col-md-3 col-form-label">Nama Produk Perusahaan</label>
                                        <div class="col-md-9 p-0">
                                            <input type="text" class="form-control input-full" name="mapel" id="editnamamapel" placeholder="Enter Input">
                                        </div>
                                    </div>



                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('updatemapel').submit()"
                            >Simpan</button>
                            </div>
                        </div>
                        </div>
                    </div>

<div class="page-inner containermateri mt--5 d-block">
   
    <div class="row">

        <div class="col-md-12">
             <div class="px-3">
                <div class="card-header row" style="border: 1px solid black !important;">
                    <div class="col-md-12">
                        <span class="float-left">Produk</span>
                        <i style="cursor:pointer;" 
                        onclick="edit('')" 
                                data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i>
                        <button class="btn btn-sm btn-primary float-right" id="btn-tambahmateri">Tambah Produk Perusahaan</button>
                    </div>

                </div>
                
            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk Perusahaan</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                
                             


                                <tr>
                                    <td>1</td>
                                    <td>Alana</td>
                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="">Show & Edit</a>
                                        <a class="dropdown-item" onClick="hapus(this)" type="button" href="" data-target="#confirmation-modal" 
                                        data-toggle="modal" 
                                        >Hapus</a>
                                        </div>
                                    </td>

                                </tr>

                                


                            </tbody>
                        </table>
                    </div>
 
            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Apakah Anda Ingin Menghapus Produk?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fe fe-x-square"></i></button>
                        Tidak
                    </div>
                    <div class="col-6">
                        <form method="post" id="linkhapus">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fe fe-check"></i></button>
                        </form>
                        Ya
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-inner containertambahmateri mt--5 d-none">
    
    <div class="row">
        <div class="col-md-12  mt-5">
           <div class="card">
              <div class="card-header bg-primary">
                 <h6 class="text-white">Tambah Produk Perusahaan <div style="cursor: pointer;" class="float-right kembalimateri">X</div> </h6>
              </div>
              <div class="card-body">
                 <form method="post" action="{{url('kelolamateri')}}" enctype="multipart/form-data" id="submitdata">
                    @csrf

                   

                    <div class="form-group">
                       <label>Produk Perusahaan</label>
                       <input type="text" name="judul" id="nama_materi" class="form-control"/>
                    </div>
                    <div class="form-group">
                       <label>Deskripsi :</label>
                       <textarea class="summernote_dessription" name="materi" id="isi_materi"></textarea>
                    </div>
                   
                 </form>
                 <div class="form-group text-center">
                    <button onclick="submitMateri()" class="btn btn-info btn-sm">Submit</button>
                 </div>
              </div>
           </div>
      </div>
   </div>

</div>


    
@endsection

@section('js')


<script>

$(document).ready(function() {

@if(session()->has('message'))
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: "{{session()->get('message')}}",
})
@endif


});

$('#basic-datatables').DataTable({
});

$('.searchbox-input').keyup( function () {
    $('.materi').removeClass('d-none');
    var filter = $(this).val(); // get the value of the input, which we filter on
    $('.listmateri').find('.materi .card-body .row .col-stats .numbers  p:not(:contains("'+filter+'"))').parent().parent().parent().parent().parent().addClass('d-none');
});

$('#btn-tambahmateri').click(()=>{
    $('.panel-header').removeClass('d-block').addClass('d-none')
    $('.containermateri').removeClass('d-block').addClass('d-none')
    $('.containertambahmateri').removeClass('d-none').addClass('d-block')

})


$('.kembalimateri').click(()=>{
    $('.panel-header').removeClass('d-none').addClass('d-block')
    $('.containermateri').removeClass('d-none').addClass('d-block')
    $('.containertambahmateri').removeClass('d-block').addClass('d-none')

})



$(document).ready(function() {
    $('.summernote_dessription').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video','audio']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],

})
})


function hapus(url){
    var link_hapus = url.href
    $('#linkhapus').attr('action',link_hapus)
}

function edit(id,mapel) {
    $("#updatemapel #editnamamapel").val(mapel)
    $("#updatemapel").attr("action","{{url('kelolamapel')}}"+"/"+id)
    $("#editMapel").modal("show")
}



function submitMateri(){
    if($('#isi_materi').val() == "" || $('#nama_materi').val() ==""){
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: "Kolom Wajib Diisi Semua",
        })
    }else{
        $("#submitdata").submit()
    }
}


 
</script>


@include('profil.ikhtisar.customsummernote')

@endsection