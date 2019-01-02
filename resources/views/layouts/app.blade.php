<!-- Mixins--><!DOCTYPE html>
<html lang="en">
  @include('partials._head')
  <body>
    <div id="wrapper">
      @include('partials._header')
      <!--#header-->
      @yield('content')
      <!--#content-->
      @include('partials._footer')
      <!--#footer-->
    </div>
    <!--#wrapper-->
    <!--JS-->
    @include('partials._scripts')
  </body>
</html>