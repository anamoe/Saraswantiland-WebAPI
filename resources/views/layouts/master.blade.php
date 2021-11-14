<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SARASWANTILAND</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	@include('layouts.css')

	
</head>
<body>
	<div class="wrapper">
		
        @include('layouts.header')

		@include('layouts.sidebar')
    
    

		<div class="main-panel">
		    
			<div class="content">
				@yield('content')
				
				

				
			</div>
			
				<!-- Modal -->
                    <div class="modal fade" id="uploadnewbio" aria-labelledby="uploadnewbio" aria-hidden="true">
                    	<div class="modal-dialog modal-lg">
                    	  <div class="modal-content">
                    		<div class="modal-header">
                    		  <h5 class="modal-title" id="exampleModalLabel">Bio</h5>
                    		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                    		  </button>
                    		</div>
                    		<div class="modal-body">
                    		  	<form action="{{url('uploadbio')}}" method="post" id="postBio" enctype="multipart/form-data">
                    				@csrf
                    
                    				<div class="form-group">
                    					<label for="exampleInputEmail1">Nama Bio</label>
                    						<input type="name" class="form-control" onkeyup="cekBioBaru()" name="nama" id="namabio">
                    				</div>
                    
                    				<div class="form-group upimagebio">
                    					<button type="button" class="btn btn-success btn-border btn-block" onclick="document.getElementById('uploadimagefilebio').click()">
                    						<i class="flaticon-photo-camera" style="font-size: 50px;"></i>
                    					</button>
                    				</div>
                    
                    				<img id="img-uploadbio" src='' alt="" class="img-uploadbio d-none w-100" onclick="document.getElementById('uploadimagefilebio').click()">
                    				<input type="file" class="d-none" onchange="readURLBIO(this);" name="image" accept="image/*" id="uploadimagefilebio">
                    			</form>
                    		</div>
                    		<div class="modal-footer">
                    		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    		  <button type="button" class="btn btn-success kirimbio" onclick="document.getElementById('postBio').submit()" disabled>Upload</button>
                    		</div>
                    	  </div>
                    	</div>
                      </div>
                    
                    </div>
			

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">

					</nav>
					<div class="copyright ml-auto">
						<i class="fa fa-heart heart text-danger"></i> <a href="/">Kaizen</a>
					</div>				
				</div>
			</footer>
		</div>
		
	
	</div>
	
    @include('layouts.js')

</body>
</html>