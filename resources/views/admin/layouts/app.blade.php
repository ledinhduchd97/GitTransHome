<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    @include('admin.partials._head')
    
</head>
<body>
        <!-- Left Panel -->

    @include('admin.partials._header')

    @yield('content')

    @include('admin.partials._footer')
    
    @include('admin.partials._script')
    

</body>
</html>
