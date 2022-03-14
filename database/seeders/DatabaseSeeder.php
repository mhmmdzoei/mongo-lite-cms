<?php

namespace Database\Seeders;

use App\Models\content;
use App\Models\user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $salt = Str::random(5);
        $req_password = generatePassword($salt,"Mn@123456");
        $insertObj = array();
        $insertObj['_id']           = getNewMongoId();
        $insertObj['username']      = "admin";
        $insertObj['password']      = $req_password;
        $insertObj['salt']          = $salt;
        $insertObj['is_active']     = "1";
        $success_save = user::create($insertObj);

        $insertObj = array();
        $insertObj['_id']           = getNewMongoId();
        $insertObj['seo']      = null;
        $insertObj['title']      = null;
        $insertObj['keywords']          = null;
        $insertObj['description']     = null;
        $insertObj['name']     = "header";
        $insertObj['content']     = <<<EOT
<!DOCTYPE>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Black dogs</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="front/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="front/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="front/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="front/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
      <link rel="stylesheet" href="front/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
EOT;
        $insertObj['is_active']     = "1";
        $insertObj['description']     = null;
        $success_save = content::create($insertObj);


        $insertObj = array();
        $insertObj['_id']           = getNewMongoId();
        $insertObj['seo']      = null;
        $insertObj['title']      = null;
        $insertObj['keywords']          = null;
        $insertObj['description']     = null;
        $insertObj['name']     = "footer";
        $insertObj['content']     = <<<EOT
<!-- Javascript files-->
      <script src="front/js/jquery.min.js"></script>
      <script src="front/js/popper.min.js"></script>
      <script src="front/js/bootstrap.bundle.min.js"></script>
      <script src="front/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="front/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
      <script src="front/js/custom.js"></script>
      <script>
         function openNav1() {
         document.getElementById("side_bar").style.width = "250px";
         }

         function closeNav1() {
         document.getElementById("side_bar").style.width = "0";
         }
      </script>
   </body>
</html>
EOT;
;
        $insertObj['is_active']     = "1";
        $success_save = content::create($insertObj);

        $insertObj = array();
        $insertObj['_id']           = getNewMongoId();
        $insertObj['seo']      = "homepage";
        $insertObj['title']      = "MongoDB CMS Lite";
        $insertObj['keywords']          = "mongodb,cms";
        $insertObj['description']     = "A Lite CMS served by MongoDB";
        $insertObj['name']     = "Main Page";
        $insertObj['content']   =  <<<EOT
###header###

      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="front/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <span class="toggle_side_bar" onClick="openNav1()"><i class="fa fa-bars"></i></span>
      <div id="side_bar" class="sidenav">
         <div class="side_bar_logo">
            <div class="logo"> <a href="index.html"><img src="front/images/logo.png" alt="#"></a> </div>
         </div>
         <a href="javascript:void(0)" class="closebtn" onClick="closeNav1()">X</a>
         <div class="scoll_to_id_menu">
            <nav class="nav">
               <div class="padded">
                  <ul>
                     <li class="active"><a class="nav-section1" href="index.html">Home</a></li>
                     <li><a class="nav-section2" href="#">About </a></li>
                     <li><a class="nav-section3" href="#">Traning </a></li>
                     <li><a class="nav-section4" href="#">Gallery </a></li>
                     <li><a class="nav-section5" href="#">Contact </a></li>
                  </ul>
                  <div class="top_btn">
                     <a class="read_more" href="#">Login</a>
                     <a class="read_more paoo" href="#">Signup</a>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <div class="main_section">
         <div class="container padddd">
            <div class="row">
               <div class="col-md-6 padding_lrtb0">
                  <div class="bg">
                     <div class="text-bg">
                        <span>WANT TO HAVE </span>
                        <h1>A GOOD <br>FRIEND?  </h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majorityThere are many variations of passages of Lorem Ipsum available, but the majorityThere are many variations of passages of Lorem Ipsum available, but the majority</p>
                        <a class="read_more" href="#">Contact Us</a>
                        <a class="read_more" href="#">Buy Now</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 padding_lrtb0">
                  <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container padding_lrtb0">
                              <div class="carousel-caption">
                                 <div class="images_box">
                                    <figure><img src="front/images/babber_box.jpg"></figure>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container padding_lrtb0">
                              <div class="carousel-caption">
                                 <div class="images_box">
                                    <figure><img src="front/images/babber_box.jpg"></figure>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container padding_lrtb0">
                              <div class="carousel-caption ">
                                 <div class="images_box">
                                    <figure><img src="front/images/babber_box.jpg"></figure>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end banner -->
      <!-- about -->
      <div id="about"  class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7 padding-left">
                  <div class="about_img">
                     <figure><img src="front/images/about_img.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>About Black Dogs</h2>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                     <a class="read_more">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- Our -->
      <div class="Our">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-4">
                  <div class="titlepage">
                     <h2>Our Dogs</h2>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, and</p>
                     <a class="read_more" href="#">See More</a>
                  </div>
               </div>
               <div class="col-md-8">
                  <div id="Our_slide" class="carousel slide Our_banner" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#Our_slide" data-slide-to="0" class="active"></li>
                        <li data-target="#Our_slide" data-slide-to="1"></li>
                        <li data-target="#Our_slide" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <figure><img src="front/images/dog.jpg" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <figure><img src="front/images/dog.jpg" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <figure><img src="front/images/dog.jpg" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#Our_slide" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     </a>
                     <a class="carousel-control-next" href="#Our_slide" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Our -->
      <!-- contact -->
      <div class="contact">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7 padding-left">
                  <div class="cont">
                     <figure><img src="front/images/conm.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-5">
                  <form id="contact" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <div class="titlepage">
                              <h2>Contact</h2>
                           </div>
                        </div>
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="Name">
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email">
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone" type="type" name="Phone">
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message </textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row d_flex">
                  <div class="col-md-6">
                     <div class="address">
                        <h3>Subscribe Now</h3>
                     </div>
                     <form class="bottom_form">
                        <div class="row">
                           <div class="col-md-12">
                              <input class="enter" placeholder="Enter Your email" type="text" name="Enter Your email">
                           </div>
                        </div>
                        <button class="sub_btn">Submit</button>
                     </form>
                     <ul class="Menu_footer">
                        <li><a href="#">Ph. 0123456789</a> </li>
                        <li><a href="#">Email.demo@gmail.com</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-6">
                     <div class="map">
                        <figure><img src="images/map.jpg" alt="#"/></figure>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <p>© 2022 All Rights Reserved. <a href="#">MongoDB Lite CMS</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
###footer###
EOT;

        $insertObj['is_active']     = "1";
        $success_save = content::create($insertObj);


    }
}
