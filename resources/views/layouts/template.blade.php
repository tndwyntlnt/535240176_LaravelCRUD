<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body id="page-top">

    @include('layouts.menu')

    @yield('content')

    @include('layouts.footer')

    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>




    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>