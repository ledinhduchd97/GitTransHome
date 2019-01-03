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
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId            : '600778687022704',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v2.12'
        });
      };

      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-customerchat" page_id="2169778806673840"></div>
  </body>
</html>