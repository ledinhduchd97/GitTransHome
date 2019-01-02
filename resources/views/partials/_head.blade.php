<head>
	<title>@yield('title')</title>
	<meta charset="utf-8"/>
	<meta name="description" content="The description"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
	<meta name="keywords" content="coding, html, css"/>
	<meta name="author" content="someone"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Styles-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/owlcarousel/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/owlcarousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}"/>
	@yield('css')
</head>