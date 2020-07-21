<!DOCTYPE html>
<html lang="en">
<head>
    <!--Configured Title (APP_NAME) in .env configuration file, any value set there will show as title. [MN - 07.Jun.2020]-->
    <title>{{config('app.name')}}</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/bootstrap-datepicker.css">


     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
     <link rel="stylesheet" href="css/logincss.css">
    <style>
        

    </style>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="30">
    <div class="header">
        @section("header")
            <!-- PRE LOADER -->
            <section class="preloader">
                <div class="spinner">

                    <span class="spinner-rotate"></span>
                    
                </div>
            </section>


        <!-- MENU -->
        <section class="navbar-default navbar-static-top" role="navigation">
            
        

        
        
            <div class="container">

               <div class="navbar-header">
                <img src="/images/logo.png" alt="" height=50 width=60>
                <h6 class="font-weight-bolder"><small>Liver and <br/> Stomach Clinic </small></h6>
                
                    <!-- lOGO TEXT HERE -->
                    <!-- <a href="/" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a> -->
               </div>

               <!-- MENU LINKS -->
               <!-- <div class="collapse navbar-collapse"> -->
                
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/#top" >Home</a></li>
                         <li><a href="/#team">Our Services</a></li>
                         <li><a href="/posts/#blog_index">Blogs</a></li>
                         <li><a href="/#news">News</a></li>
                         <li><a href="/#about">About Us</a></li>
                         <li><a href="/#google-map" >Contact</a></li>
                         <li class="appointment-btn"><a href="/#appointment">Make Appointment</a></li>
						 <li class="appointment-btn"><a href="/clinic_user">Clinic Staff Login</a></li>
                    </ul>
               <!-- </div> -->

            </div>
         </section>



        @show
    </div>
    @yield('content')
    <div class="footer">
    @section('footer')
            <!-- FOOTER -->
                <footer data-stellar-background-ratio="5">
                    <div class="container">
                        <div class="row">

                                <div class="col-md-4 col-sm-4">
                                    <div class="footer-thumb"> 
                                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                                        <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                                        <div class="contact-info">
                                            <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                            <p><i class="fa fa-envelope-o"></i> <a href="#">giclinic@hotmail.com</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4"> 
                                    <div class="footer-thumb"> 
                                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                                        <div class="latest-stories">
                                            <div class="stories-image">
                                                    <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                            </div>
                                            <div class="stories-info">
                                                    <a href="#"><h5>Amazing Technology</h5></a>
                                                    <span>March 08, 2018</span>
                                            </div>
                                        </div>

                                        <div class="latest-stories">
                                            <div class="stories-image">
                                                    <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                            </div>
                                            <div class="stories-info">
                                                    <a href="#"><h5>New Healing Process</h5></a>
                                                    <span>February 20, 2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4"> 
                                    <div class="footer-thumb">
                                        <div class="opening-hours">
                                            <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                            <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                            <p>Saturday <span>Closed</span></p>
                                            <p>Sunday <span>Closed</span></p>
                                        </div> 

                                        <ul class="social-icon">
                                            <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                            <li><a href="#" class="fa fa-twitter"></a></li>
                                            <li><a href="#" class="fa fa-instagram"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 border-top">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="copyright-text"> 
                                            <!--Copyright year changed from 2018 to 2020. [MN - 07.Jun.2020]-->
                                            <p>Copyright &copy; 2020 
                                            
                                            | Design: Tooplate</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="footer-link"> 
                                            <a href="#">Laboratory Tests</a>
                                            <a href="#">Departments</a>
                                            <a href="#">Insurance Policy</a>
                                            <a href="#">Careers</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 text-align-center">
                                        <div class="angle-up-btn"> 
                                            <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                                        </div>
                                    </div>   
                                </div>
                                
                        </div>
                    </div>
                </footer>

                <!-- SCRIPTS -->
                <script src="js/jquery.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.sticky.js"></script>
                <script src="js/jquery.stellar.min.js"></script>
                <script src="js/wow.min.js"></script>
                <script src="js/smoothscroll.js"></script>
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/custom.js"></script>
                <script src="js/moment.min.js"></script>
                <script src="js/bootstrap-datepicker.js"></script>


                <script type="text/javascript">
                        $('#datepicker').datepicker({
                            daysOfWeekDisabled: [0,6],
                            startDate: '+0d',
                            endDate: '+13d',
                            format: 'dd-mm-yyyy'
                            }).on('changeDate', function(e) {
                                var mydate = $(this).val();
                                console.log(mydate);
                            if(mydate) {
                                $.ajax({
                                    url: '/welcome/ajax/'+mydate,
                                    type: "GET",
                                    dataType: "json",
                                    success:function(data) {
                                        var booked = [];
                                        var all = ['06:00 pm', '06:15 pm', '06:30 pm', '06:45 pm', '07:00 pm', '07:15 pm', '07:30 pm', '07:45 pm', '08:00 pm', '08:15 pm', '08:30 pm', '08:45 pm', '09:00 pm', '09:15 pm', '09:30 pm', '09:45 pm'];
                                        
                                        var len = data.length;
                                            
                                            $("#time").empty();
                                            for( var i = 0; i<len; i++){
                                                var id = data[i]['value'];
                                                var name = data[i]['time'];
                                                booked.push(data[i]['time']);        
                                            }

                                        var available = $(all).not(booked).get();
                                        
                                        for(var j=0; j<available.length; j++){

                                            $("#time").append("<option>"+available[j]+"</option>");

                                        }

                                    }
                                });
                            }else{
                                $('select[name="time"]').empty();
                            }
                        });
                       // $("#datepicker").datepicker("setDate", '-- Select Date --');//new Date());
                        
                        
                </script>

               
    @show
    </div>
</body>
</html>

