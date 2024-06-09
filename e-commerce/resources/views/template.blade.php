<!DOCTYPE html>
<html lang="en">
 
@include('header')
 
<body>
    @include("menu")
   
    @yield('content')
 
    @include("footer")
 
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
 
</html>