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
			

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">

					</nav>
					<div class="copyright ml-auto">
						<a href="/">SARASWANTILAND</a>
					</div>				
				</div>
			</footer>
		</div>
		
	
	</div>
	
    @include('layouts.js')

</body>
</html>