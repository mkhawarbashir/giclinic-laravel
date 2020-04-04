@extends('layouts.mainlayout')

@include('flash-message')
@section('content')

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make your life happier</h3>
                                             <h2>Healthy Living</h2>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctor</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>“Wherever the art of Medicine is loved, there is also a love of Humanity.”</h3>
                                             <h1>New way of curing</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>“Let food be thy medicine and medicine be thy food.”</h3>
                                             <h2>Healthy stories</h2>
                                             <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>

     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-h-square"></i>ealth Clinic</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
                                   <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/about-bg2.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Prof. Dr. Muhammad Imran</h3>
                                        <p>Gastro Hepatitis Specialist</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Services</h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/team-image1.jpg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Liver and Gastro</h3>
                              
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/team-image2.jpg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Hepatitis B & C</h3>
                                        
                                        
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <img src="images/team-image3.jpg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Endoscopy</h3>
                                        
                                   </div>

                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Latest News</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="images/news-image1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>March 08, 2018</span>
                                   <h3><a href="news-detail.html">About Amazing Technology</a></h3>
                                   <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
                                   <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Jeremie Carlson</h5>
                                             <p>CEO / Founder</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html">
                                   <img src="images/news-image2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>February 20, 2018</span>
                                   <h3><a href="news-detail.html">Introducing a new healing process</a></h3>
                                   <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                                   <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Jason Stewart</h5>
                                             <p>General Director</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="news-detail.html">
                                   <img src="images/news-image3.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>January 27, 2018</span>
                                   <h3><a href="news-detail.html">Review Annual Medical Research</a></h3>
                                   <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                                   <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Andrio Abero</h5>
                                             <p>Online Advertising</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

	
     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="/appointmentsubmit">
                         @csrf
                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <span style="color:red;font-weight:bold">*</span>
									    <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="date">Select Date</label>
                                        <input type="date" name="date" id="date" value="" class="form-control" required>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Select Time</label>
                                        <select class="form-control" id="time" name="time">
                                             <option>06:00</option>
                                             <option>06:15</option>
                                             <option>06:30</option>
                                             <option>06:45</option>
											 <option>07:00</option>
                                             <option>07:15</option>
                                             <option>07:30</option>
                                             <option>07:45</option>
											 <option>08:00</option>
                                             <option>08:15</option>
                                             <option>08:30</option>
                                             <option>08:45</option>
											 <option>09:00</option>
                                             <option>09:15</option>
                                             <option>09:30</option>
                                             <option>09:45</option>
                                        </select>
                                   </div>
								   <div class="col-md-6 col-sm-6">
                                        <label for="select">Select Your City</label>
                                        <select class="form-control" id="city" name="city">
                                             <option>Lahore</option>
                                             <option>Gujranwala</option>
                                             <option>Kasur</option>
                                             <option>Sahiwal</option>
											 <option>Okara</option>
                                             <option>Pattoki</option>
                                             <option>Sialkot</option>
                                             <option>Muridkey</option>
											 <option>Rawalpindi</option>
                                             <option>Jehlum</option>
                                             <option>Gujrat</option>
                                             
                                        </select>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="telephone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required minlength="11" maxlength="11">
								   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="Message">CNIC</label>
                                        <input type="tel" class="form-control" id="cnic" name="cnic" placeholder="35200xxxxxxxx" required minlength="13" maxlength="13">
									</div>

                                   <div class="col-md-12 col-sm-6">
									    <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                                   </div>
                              </div>
                        </form>
                       	
                    </div>

               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13601.781170546043!2d74.35263019999996!3d31.53939190000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5dcfaeeb2a761500!2sLiver%20and%20Stomach%20clinic%2C%20Professor%20Muhammad%20Imran!5e0!3m2!1sen!2s!4v1585036063177!5m2!1sen!2s" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           

@endsection
