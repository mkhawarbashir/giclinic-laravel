<!DOCTYPE html>
<html lang="en">
<head>

     <title>GI Clinic</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     
     <link rel="stylesheet" href="css/bootstrap2.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/custom.css">



</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <div class="header">
        @section("header")
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img src="bird.jpg" alt="logo" style="width:40px;">
        </a>
        
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>
        </nav>


        @show
    </div>
    

    

    @yield('content')

    

    <div class="footer">
        @section('footer')
            <!-- FOOTER -->
            <div id="copyright text-right">© Copyright 2020 GI Clinic</div>

            <!-- SCRIPTS -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/popper.min.js"></script>
        @show
    </div>

</body>
</html>