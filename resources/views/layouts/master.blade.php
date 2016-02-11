<!doctype html>
<html lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/assets/css/app.css" rel="stylesheet" type="text/css">


  </head>
  <body>
        @section('header')
           @include('layouts.header')
         @show

        <div class="container">
            @yield('content')
        </div>
        <script src="/assets/js/vendor/jquery.min.js"></script>
        <script src="/assets/js/angular/angular.min.js"></script>
        <script src="/assets/js/vendor/datatables.min.js"></script>
        <script src="/assets/js/angular/ui-grid.min.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
        <script src="/assets/js/vendor/ui-bootstrap-1.1.2.min.js"></script>
        <script src="/assets/js/angular/app.js"></script>
        <script src="/assets/js/app.js"></script>
        @yield('footer-script')
  </body>
</html>