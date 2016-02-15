<!doctype html>
<html lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/assets/css/app.css" rel="stylesheet" type="text/css">
    @yield('head-style')
    @yield('head-script')
  </head>
  <body ng-controller="mainCtrl">
        @section('header')
           @include('layouts.header')
         @show

        <div class="container">
            @yield('content')
        </div>
        <script src="/assets/js/vendor/jquery.min.js"></script>
        <script src="/assets/js/angular/angular.min.js"></script>
        <script src="/assets/js/vendor/datatables.min.js"></script>
        <script src="/assets/js/vendor/ui-bootstrap-tpls-1.1.2.js"></script>
        <script src="/assets/js/angular/app.js"></script>
        <script src="/assets/js/app.js"></script>
        @yield('footer-script')
  </body>
</html>