<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'subject' => $subject,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}

?>









<!doctype html>
<html lang="en">
  <head>
    <title>GIRLSCRIPT UDAIPUR &mdash;LETS STUDY TOGETHER  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta  name ="keywords" content"Girlscript Udaipur webinar bootcamp python javascript Anurag singh technology solar man of india udaipur city"/>
    <meta name ="Description" content="GirlScript Udaipur is an emerging tech community under Girlscript Foundation. The community endeavours to upgrade the learning strategy
              in Technology and Innovation. The community believes in enhancing the ways to impart knowledge to our future society. The members from different colleges having diverse experiences and skills work together leveraging the sources
            available for creating awareness about tech and other  relevant skill. We are here to provide students a platform to learn and built up a huge network in this competitive world.">
    <meta name ="author" content ="Anurag singh">
    
    <link rel=" shortcut icon" type="image/x-icon" href="/images/logo.png">
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">




  </head>


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="h2 mb-0"><img src="images/Udaipur Logo.png"width="380px" height="100px" style="float:left"><span class="text-primary"></span> </a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">About Us</a>
                  <ul class="dropdown">
                     <li><a href="#team-section" class="nav-link">Team</a></li>
                     <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>

                  </ul>
                </li>

                <li><a href="#portfolio-section" class="nav-link">Gallery</a></li>
                <li><a href="#services-section" class="nav-link">Our Mission</a></li>
                <li><a href="#pricing-section" class="nav-link">Upcoming Events</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>



    <div class="site-blocks-cover overlay" style="background-image: url(images/bg1.png);" data-aos="fade" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mt-lg-5 text-center">
            <h1 class="text-uppercase" data-aos="fade-up">Welcome</h1>
            <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100"><h1><strong>To Girlscript Udaipur!<br>Let's learn Together .....</br></strong></h1></p>
            <div data-aos="fade-up" data-aos-delay="100">
              <a href="#contact-section" class="btn smoothscroll btn-primary mr-2 mb-2">Get In Touch</a>
            </div>
          </div>

        </div>
      </div>

      <a href="#about-section" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
    </div>


    <div class="site-section cta-big-image" id="about-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">About Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
            <figure class="circle-bg">
            <img src="images/ABOUT.jpg" alt="Image" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="mb-4">
              <h2 class="h3 mb-4 text-black">....GIRLSCRIPT UDAIPUR....</h2>
              <p>GirlScript Udaipur is an emerging tech community under Girlscript Foundation. The community endeavours to upgrade the learning strategy
              in Technology and Innovation. The community believes in enhancing the ways to impart knowledge to our future society. The members from different colleges having diverse experiences and skills work together leveraging the sources
            available for creating awareness about tech and other  relevant skill. We are here to provide students a platform to learn and built up a huge network in this competitive world.</p>
          </div>
          </div>
        </div>
      </div>
    </div>

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Our Success</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">“People Who Are Crazy Enough To Think They Can Change The World, Are The Ones Who Do.” <br>– Rob Siltanen<br></p>
          </div>
        </div>

        <div class="row" >
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">

            <div class="owl-carousel slide-one-item-alt">
              <img src = "images/u1.jpeg" alt = "Image" class = "img-fluid">
              <img src="images/1.jpg" alt="Image" class="img-fluid">
              <img src="images/2.jpg" alt="Image" class="img-fluid">
              <img src="images/3.jpg" alt="Image" class="img-fluid">
              <img src="images/4.jpg" alt="Image" class="img-fluid">
              <img src="images/5.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="custom-direction">
              <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
            </div>

          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">

            <div class="owl-carousel slide-one-item-alt-text">
                 <div>
                <h2 class="section-title mb-3">Skill For Ultimate Success</h2>
                <p class="lead">Effective Communication skills play a crucial role in honing one's personality. Communication helps individuals to express themselves in the most convincing way and along with it a positive attitude brings optimism into your life, and makes it easier to avoid worries and negative thinking</pr>
                    
                 <p>Dr. Abhilash Modi is an author, a writer, a philanthropist, a humanitarian, a language trainer, a life coach, a motivator, a world record holder and most importantly teacher that he loves to listen from people as his introduction. 
                He specializes in spiriting and empowering people to realize their true potential.As a keynote orator thousands of individuals have been benefitted from his energetic and practical approach of thinking in many seminars, workshops, trainings, social gatherings nationwide</p>
                 <p><a href="https://abhilashmodi.com" target="_blank" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                 
               </div>
              <div>
                <h2 class="section-title mb-3">A New Look at Energy and Sustainability</h2>
                <p class="lead">Meeting the world's needs for electricity, energy and power for transport in a sustainable way is widely considered to be one of the greatest challenges facing humanity in the 21st century.
                For this requisite Girlscript Udaipur is going to Organise a Webinar on " A New Look at Energy and Sustainability ".</p>
             <p>  Dr. Chetan Singh Solanki is Professor at Department of Energy Science and Engineering at IIT Bombay. He is also an author of several books and written over 100 research articles.
                He is also referred to as Solar Man of India by Times of India, The Hindu and India Today.
                Following Gandhian ideals, he has coined the word ‘Energy Swaraj’. His Energy Swaraj Movement is a stepping stone towards energy access, energy sustainability, and climate change mitigation.</p>

                <p><a href="https://energyswaraj.org" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
               
              </div>
              <div>
                <h2 class="section-title mb-3">Happy Independence Day</h2>
                <p class="lead">Freedom is hard to get, but we were blessed to have it. Let’s appreciate everything we have and celebrate the great miracle of freedom. </p>
                <p>Girlscript Udaipur wishes you all a very Happy Independence Day Jai Hind!!</p>
              </div>
              <div>
                <h2 class="section-title mb-3">GS Cup 2020</h2>
                <p class="lead">GS Cup is a community-based event that will promote and encourage the students who have contributed to any community.</p>
                <p>GS Cup will be awarded to the students who will score the maximum number of points according to the guidelines and contribution he/she has given to the community.
                There will be two categories for the event:
                1. Everyone
                2. For Girlscript Family</p>

                <p><a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&ved=2ahUKEwjdvbezx6LrAhV3xzgGHVb3D10QFjAAegQIAhAB&url=https%3A%2F%2Fwww.girlscript.tech%2Fgscup&usg=AOvVaw3e0z1IvObANFXsst8y3Jza" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
              </div>

              <div>
                <h2 class="section-title mb-3">GIRLSCRIPT INDIA SUMMIT 2020</h2>
                <p class="lead">GirlScript India Summit 2020 is the 4th edition of the annual summit conducted by India's biggest and first-ever tech education community and organization to support beginners, the GirlScript Foundation.GirlScript India Summit will host the best entrepreneurs, engineers, developers, students, and professors. Get ready to witness 3 days full of tech talks, panel discussions, workshops, hackathon, and 21 under 21 awards.</p>
                <p>The Early Bird Ticket Registration for the SUMMIT has officially Started.BEING A PART OF SOMETHING SPECIAL MAKES YOU REALLY SPECIAL So, make yourself really special by being a part of our SUMMIT</p>

                <p><a href="https://girlscriptsummit.com" class="btn btn-primary mr-2 mb-2">Register </a></p>
              </div>
              <div>
              <h2 class="section-title mb-3">HOW TO GRAB INTERNSHIP OPPORTUNITY</h2>
              <p class="lead">This seems to be the biggest issue for young adults transitioning into the workforce these days.
Employers in today's labor market rely heavily on resumes that illustrate a relevant work history, whether that's from internships, volunteer work, or actual job experience.
A practical work background carries a major significance when attempting to enter the job market. It's all about competition.
Not only are businesses competing against each other for a competitive advantage, but people are also competing to land that coveted position in a company.
Even your buddy who graduated with you in college has become your competition.
</p>
              <p>That one internship you did over summer could be the difference between winning a job opportunity or losing it.</p>
              <p><a href="https://techtable.co.in" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
            </div>
            </div>
            <div>
          </div>
        </div>
      </div>
    </section>



    <section class="site-section border-bottom" id="team-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Our Team</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">"Talent wins games, but teamwork and intelligence win championships." <br>--Michael Jordan.</br></p>
          </div>
        </div>
        <div class="row">


          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="team-member">
              <figure>
                <ul class="social">
                    <li><a href="https://m.facebook.com/krishnapal.deora.5?ref=bookmarks"><span class="icon-facebook"></span></a></li>
                    <li><a href="https://mobile.twitter.com/Krishna28431084"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/krishnapal-deora-76190018b"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/krishnapald02/?hl=en"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p1.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Krishnapal Singh Deora</h3>
                <span class="position">Chapter Lead </span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://m.facebook.com/profile.php"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://mobile.twitter.com/AnuragS41623983"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/anurag-singh-95aa81185/"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/agangwar908/"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p21.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Anurag Singh</h3>
                <span class="position">Web Developer</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/profile.php?id=100009808262664"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://mobile.twitter.com/AnjaliV11205173"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/anjali-vyas-a4b7521b3"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/p/CEAEbilAn8B_6jLVDsPovZI11nnUffkp1OohD40/?igshid=1j96venqzk2we"https://www.instagram.com/p/CEAEbilAn8B_6jLVDsPovZI11nnUffkp1OohD40/?igshid=1j96venqzk2we><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p3.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Anjali Vyas</h3>
                <span class="position">Web Developer</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/arvindsingh.rajput.5872"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/ArvindS18841557"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/arvind-singh-bhati-67282a194/"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/kr.arvind_singh/"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p8.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Arvind Singh Bhati </h3>
                <span class="position">Public Relation Head</span>
              </div>
            </div>
          </div>
           <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/profile.php?id=100016569976983"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/Sharma_Mayank20?s=09"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/mayank-sharma-b80ba1176"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/invites/contact/?i=kbjhitkrdl9u&utm_content=3ngxdq3"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p9.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Mayank Sharma</h3>
                <span class="position">Public Relation Head</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/sudhir.tiwari.790"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/SudhirT91878754/status/1268776255609946112?s=20"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/sudhir-kr-tiwari-280000169"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/p/CAnoeiVnFau/?igshid=4ocgq2c7b0h6"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p4.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Sudhir Tiwari </h3>
                <span class="position">Marketing Head </span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/bhoopendra.mehta.7"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/BhoopendraMehta"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/bhoopendra-mehta-85ab631a2"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/bhoopendraMehta7"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p5.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Bhoopendra Mehta </h3>
                <span class="position">Marketing Head</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/vishnu.arora.98"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/MansiAr62484381?s=08"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/mansi-arora-410602187"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/mansi.arora19/"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p6.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Mansi Arora </h3>
                <span class="position">Content Writer</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <figure>
                 <ul class="social">
                  <li><a href="https://m.facebook.com/vishal0487?ref=bookmarks"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/VishalS86599984?s=09"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/vishal-soni-707b54195"><span class="icon-linkedin"></span></a></li>
                  <li><a href="http://www.instagram.com/_s0ni_02/?hl=en"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p7.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Vishal Soni</h3>
                <span class="position">Content Writer </span>
              </div>
            </div>
          </div>
          
          
          
          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="https://www.facebook.com/charvi.mathur.733"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/mathur_charvi?s=09"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/in/charvi-mathur-2892121b4"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://instagram.com/charvi16_06"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p22.jpeg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Charvi Mathur</h3>
                <span class="position">Technical Content Writer</span>
              </div>
            </div>
          </div>
           <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <figure>
                  <ul class="social">
                  <li><a href="https://m.facebook.com/profile.php"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://twitter.com/DHIRAJK908?s=09"><span class="icon-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/mwlite/in/dhiraj908"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://www.instagram.com/dhirajk908/"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/p10.png" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3>Dhiraj Kumar</h3>
                <span class="position">Graphic Designer</span>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

<!--gallary-->

    <section class="site-section" id="portfolio-section">


      <div class="container">

        <div class="row mb-3">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Gallery</h2>
          </div>
        </div>

        <div class="row justify-content-center mb-5" data-aos="fade-up">
          <div id="filters" class="filters text-center button-group col-md-7">
            <button class="btn btn-primary active" data-filter="*">All</button>
            <button class="btn btn-primary" data-filter=".web">Webinar</button>
            <button class="btn btn-primary" data-filter=".design">Events</button>
            <button class="btn btn-primary" data-filter=".brand">brand</button>
          </div>
        </div>

        <div id="posts" class="row no-gutter">
             <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/u1.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/u1.jpeg">
            </a>
            </div>
          <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/1.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/1.jpg">
            </a>
          </div>
          <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/2.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/2.jpg">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g3.png" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g3.png">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">

            <a href="images/g4.png" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g4.png">
            </a>

          </div>

          <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/5.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/5.jpg">
            </a>
          </div>

          <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g7.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g7.jpg">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g6.png" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g6.png">
            </a>
          </div>

          <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g8.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g8.jpg">
            </a>
          </div>

          <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g9.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g9.jpg">
            </a>
          </div>

          <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g10.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g10.jpg">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g11.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g11.jpg">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g1.png" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g1.png">
            </a>
          </div>

          <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
            <a href="images/g2.png" class="item-wrap fancybox" data-fancybox="gallery2">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="images/g2.png">
            </a>
          </div>

        </div>
      </div>

    </section>

<!--our mission-->
    <section class="site-section border-bottom bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Our Mission</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-startup"></span></div>
              <div>
                <h3>AWARENESS ABOUT TECH</h3>
                <p>Help us reach tier-two and tier-three cities where people do not know how tech education can change their lives.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-graphic-design"></span></div>
              <div>
                <h3>SCHOLARSHIP AND FELLOWSHIP</h3>
                <p>Getting recognized is an important part of anyone's career. With GirlScript, know exactly where you fit in.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-settings"></span></div>
              <div>
                <h3>YOUNG AND ENTHUSIASTIC MENTOR</h3>
                <p>Finding like minded people who resonate with your goal is extremely important. Find such enthusiastic people through GirlScript's network.</p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-idea"></span></div>
              <div>
                <h3>WOMEN IN TECH</h3>
                <p>GirlScript is NOT a women only organsation but it has equal opportunities for everyone and thus 50% reservation for women in tech.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-smartphone"></span></div>
              <div>
                <h3>DIVERSITY</h3>
                <p>Know how Diversity & Inclusion can play an important role in generating ideas, team building and getting the maximum output.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-head"></span></div>
              <div>
                <h3>INTERNSHIP OPPORTUNITIES</h3>
                <p>Looking for a perfect team to work with? GirlScript's diverse and strong network can help you.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




   <!--upcomming events-->

            <section class="site-section" id="pricing-section">
              <div class="container">
                <div class="row mb-5">
                  <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Our Upcoming Events</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                    <div class="h-entry">
                      <a href="single.html">
                        <img src="images/u1.jpeg" alt="Image" class="img-fluid">
                      </a>
                      <h2 class="font-size-regular"><p class="text-center"> Skills For Ultimate Success</p></h2>
                      <div class="meta mb-4">Dr. Abhilash Modi <span class="mx-2">&bullet;</span> sept 1, 2020<span class="mx-2">&bullet;</span>5:00pm</div>
                        <p class="text-center"><a href="#" target = "_blank" class="btn btn-primary mr-2 mb-2">Registration Is Now Closed  </a></p>
                    </div>
                      
                    </div>
                    


                </div>
              </div>
            </section>
            </div>

<!--testimonial-->

    <section class="site-section testimonial-wrap" id="testimonials-section" data-aos="fade">
        
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Testimonials</h2>
          </div>
        </div>
      </div>
      
        <div class="slide-one-item home-slider owl-carousel">   
        <div>
            <div class="testimonial">
              <blockquote class="mb-5">
                <p>&ldquo;I joined Girlscript Foundation as a Chapter lead starting in 2020.Girlscript Foundation provided me a platform to provide an opportunity and platform to students to learn free of cost. I am getting a great exposure of handling a city wide Chapter..&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p1.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Krishnapal Singh Deora</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <blockquote class="mb-5">
                <p>&ldquo;Working with Girlscript udaipur provided me a new way to learn the things along with new faces with lots of fun. Girlscript udaipur has conducted many usefull webinar and tech activities, which help us to built our path of success.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p21.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Anurag Singh</p>
              </figure>
               </div>
          </div>
          
             <div>
            <div class="testimonial">
              <blockquote class="mb-5">
                <p>&ldquo;GirlScript is an amazing tech community to work with. It gave me the opportunity to work with different people and helped me to increase my network. Working with GirlScript gave me experience to work with an organisation, how things function in it how people manage different things. I am really having an incredible experience.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p6.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Mansi Arora</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <blockquote class="mb-5">
                <p>&ldquo;I loved the friendly atmosphere in the team of girlscript udaipur, which provide you to put your thought openly and listen to other without any boss attitude.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p8.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Arvind singh</p>
              </figure>
            </div>
          </div>
          <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;It is very good experience working with Girlscript Chapter Udaipur team.All members here are trustworthy and knowledgeable in their work.I've developed ability to work and coordinate with team.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p7.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Vishal soni</p>
              </figure>
            </div>
          </div>
          
           <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Girlscript is a best platform for increased knowledge of students and build up our confidence. I feel good to see that I am working with Girlscript as Udaipur Chapter team member.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p5.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Bhoopendra Mehta</p>
              </figure>
            </div>
          </div>
          
           <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Working with girl script is a pleasure .This platform helped me to learn many things in technology Field.The idea of girl script is very unique and is delivering knowledge about technology to its fullest .I am glad to be part of such an organisation as a community Chapter team member.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p3.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Anjali Vyas</p>
              </figure>
            </div>
          </div>
       <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;I am feeling very proud to being part of Girlscript Foundation.It's pleasure for me that i am the member of Girlscript udaipur. I'm getting great experience as a community team member.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p9.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Mayank Sharma</p>
              </figure>
            </div>
          </div>
          
           <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Girlscript Foundation is a non profit private oragnisation. They are doing a very good job and great company to work with them I Learn a lot From girlscript foundation as a girlscript community member, Coordination of team members are really amazing...&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Sudhir Tiwari</p>
              </figure>
            </div>
          </div>
          
            <div>
         <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;I enjoyed working with GirlScript Foundation as a Udaipur Chapter Team Member and got to learn a lot. Thanks to girlscript udaipur.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/p10.png" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Dhiraj Kumar</p>
              </figure>
            </div>
          </div>
      
      
          </div>
    </section>




<!--contact-->

    <section class="site-section bg-light" id="contact-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Contact Us</h2>
          </div>
        </div>
      <p class="text-center">
          <span class="icon-mail_outline d-block h4 text-primary"></span>


          <a href="mailto:girlscriptudaipur@gmail.com">girlscriptudaipur@gmail.com</a>
     </p>
          </div>
        
        
        <div class="row">
          <div class="col-md-12 mb-5">



    <div class="container">
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h2 align="center">Contact Form</h2>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" />
     </div>
     <div class="form-group">
      <label>Enter Subject</label>
      <input type="text" name="subject" class="form-control" placeholder="Enter Subject" />
     </div>
     <div class="form-group">
      <label>Enter Message</label>
      <textarea name="message" class="form-control" placeholder="Enter Message"></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
        </div>
      </div>
    </section>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>GirlScript Udaipur is an emerging tech community under Girlscript Foundation.The community endeavours to upgrade the learning strategy in Technology and Innovation, the community believes in enhancing the ways to impart knowledge to our future society. The members from different colleges having diverse experiences and skills work together leveraging the sources available for creating awareness about tech and other related relevant skill. We are here to provide students a plateform to learn and built up a huge network in this competitive world.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#services-section" class="smoothscroll">Our Mission</a></li>
                  <li><a href="#testimonials-section" class="smoothscroll">Testimonials</a></li>
                  <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="https://m.facebook.com/girlscriptudaipur/?tsid=0.9226689445309271&source=result" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="https://mobile.twitter.com/GirlcriptUDR" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="https://www.instagram.com/girlscript_udaipur/" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="https://www.linkedin.com/company/girlscript-udaipur" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
              <h3 class="footer-heading mb-4">Send Following detail:-<br>Name,Phone no. and Working Mail.</br></h3>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2"><a href="mailto:girlscriptudaipur@gmail.com">send</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to Colorlib  | with GIRLSCRIPT UDAIPUR  <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://www.girlscript.tech/home" target="_blank" >GIRLSCRIPT FOUNDATION</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            </div>
          </div>

        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>


  <script src="js/main.js"></script>

  </body>
</html>