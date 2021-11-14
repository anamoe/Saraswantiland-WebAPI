<!--   Core JS Files   -->
<script src="{{asset('public/template/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('public/template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('public/template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Datatables -->
<script src="{{asset('public/template/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('public/template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{asset('public/template/assets/js/atlantis.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('public/template/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('public/template/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>



<!-- Chart JS -->
<script src="{{asset('public/template/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('public/template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('public/template/assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/axios.min.js')}}"></script>


{{-- <script src="{{asset('public/template/assets/js/demo.js')}}"></script> --}}

<script>
    
    function cekBioBaru(){
		if($("#uploadimagefilebio").val()=="" || $("#namabio").val()==""){
		$(".kirimbio").attr('disabled',true)
		}else{
			$(".kirimbio").attr('disabled',false)
		}
	}
	


	function readURLBIO(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			$('.upimagebio').removeClass('d-none').addClass('d-none').removeClass('d-block')
			$('#img-uploadbio').removeClass('d-block').addClass('d-block').removeClass('d-none')

            reader.onload = function (e) {
                $('#img-uploadbio')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
		cekBioBaru()
    }
    
</script>
@yield('js')