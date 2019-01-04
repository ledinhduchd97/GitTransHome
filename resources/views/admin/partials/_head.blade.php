<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="The description"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
<meta name="keywords" content="coding, html, css"/>
<meta name="author" content="someone"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
<link rel="apple-touch-icon" href="{{asset('frontend-admin/apple-icon.png')}}">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"/>
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend-admin/assets/css/cs-skin-elastic.css')}}">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('frontend-admin/assets/scss/style.css')}}">
<link href="{{asset('frontend-admin/assets/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('frontend-admin/style.css')}}"/>
@yield('css')

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->