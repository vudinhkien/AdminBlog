<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=description content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{Asset('assets/css-admin/font-awesome.min.css')}}"/> {{-- link icon --}}
	<link rel="stylesheet" href="{{Asset('assets/css-frontend/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css-frontend/style.css')}}"/>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</head>
<body>
<header>
	@include('header')
</header>

<section id="content">
	@yield('content')
</section>

<footer>
	@include('footer')
</footer>
	

<!-- jQuery -->
<script src="{{ Asset('assets/js-frontend/jquery-1.11.2.min.js') }}"></script>
<!-- Bootstrap JavaScript -->
<script src="{{ Asset('assets/js-frontend/bootstrap.min.js') }}"  type="text/javascript" ></script>
<script src="{{ Asset('assets/js-frontend/main.js') }}"  type="text/javascript" ></script>
</body>
</html>