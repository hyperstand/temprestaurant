<!DOCTYPE html>
<html lang="en" style="display:none;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="#">

    <meta name="author" content="AXMPP">

    <meta name="description" content="">

    <meta name="keywords" content="">
   
    <meta charset="UTF-8">

    <title>@yield('title')</title>
    @yield('css')    
</head>
<body ng-app="App" >
   @yield('component')
</body>
@yield('javascript')
</html>