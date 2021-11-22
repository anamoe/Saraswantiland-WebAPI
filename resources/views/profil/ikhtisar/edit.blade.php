@extends('layouts.master')

@section('css')


<style>
    .modal-dialog{
        max-width:1000px;
    }
    .note-group-select-from-files{
        display: none;
    }


    .modal-dialog .modal-footer .btn-primary{
        background: black !important;
    }
    .imagemedia img{
        cursor:pointer;
    }
</style>

@endsection


@section('content')

<br><br><br>

<div class="page-inner containermateri mt--5 d-block">
   
    <div class="row">

        <div class="col-md-12">
             <div class="px-3">
                <div class="card-header row" style="border: 1px solid black !important;">
                    <div class="col-md-12">
                        <span class="float-left">Profil Perusahaan</span>
                      
                    </div>

                </div>
                
            </div>
        </div>
      </div>
</div>


<div class="page-inner containertambahmateri mt--5 ">
    
    <div class="row">
        <div class="col-md-12  mt-5">
           <div class="card">
              <div class="card-header bg-primary">
                 <h6 class="text-white">Edit Profil Perusahaan  </h6>
              </div>
              <div class="card-body">
                 <form method="post" action="{{url('ikhtisar/'.$ikhtisar->id)}}" enctype="multipart/form-data" id="submitdata">
                    @method('patch')
                    @csrf

                
                                  
                    <div class="form-group row">
                      
                        <div class="col-sm-9">
                            <!-- <input type="text" id="foto_slideshow" class="form-control"> -->

                            <div class="form-group upimageposting">
                                <button type="button" class="btn btn-primary btn-border btn-block" onclick="document.getElementById('editfotoikhtisar').click()">
                                    <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                        <img class="img" id="loadfoto"  src="{{asset('public/foto_profil/'.$ikhtisar->foto)}}"alt="Foto Thumbnail" style=" height:50%; width:50%;">

                        <input type="file" onchange="readURLfoto(this);" class="d-none" name="images" accept="image/*"id="editfotoikhtisar"></input>

                    </div>
                           
                        </div>
                    </div>
                 
                    <div class="form-group">
                       <label>Deskripsi :</label>
                       <textarea class="summernote_dessription" name="deskripsi" id="">{{$ikhtisar->deskripsi}}</textarea>
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
    $('#linkhapus').attr('href',link_hapus)
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