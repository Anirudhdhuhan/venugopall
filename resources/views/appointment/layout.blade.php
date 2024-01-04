<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ STATIC_BASE_URL . '/css/congress.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ STATIC_BASE_URL . '/css/css.css' }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5" async></script>  
	<script src="/scripts/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/scripts/scripts.js" type="text/javascript" ></script>
	<script src="https://www.google-analytics.com/analytics.js" type="text/javascript" ></script>
	<script type="text/javascript" language="javascript" src="{{ STATIC_BASE_URL . '/plugins/tosrus/jquery.tosrus.min.all.js' }}"></script>
	
    <title>Appointment</title>
</head>
<body>

<main>
	<nav class="default">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div claas="pull-left ml-1">
						<img src="{{ STATIC_BASE_URL . '/images/newlogo.png' }}" class="logo-congress mt-2">
					</div>
				</div>
				<div class="col-md-3">
					<div class="mt-4">
						<a href="/">
							<p class="pull-right" style="float:right;">Back to the Home Page</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<input type="text" name="myInput" value="" id="myInput" style="border:none;color:#fff;">
    @yield('content')
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>