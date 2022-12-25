<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ackko</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ackko, ackko.com , www.ackko.com" name="keywords">
    <meta content="ackko, ackko.com , www.ackko.com" name="description">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>/assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url(); ?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url(); ?>/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
    <style type="text/css">
        .mobo_menu {
            position: absolute;
            width: 0px;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 2122;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 30px 15px;
            box-shadow: 3px 0px 5px -1px rgba(0, 0, 0.4);
            display: none;
        }

        .mobo_menu .mobo_menu_box {}

        .mobo_menu .nav-menu li {
            float: none;
        }
    </style>
</head>

<body>

    <!--==========================
    Header
  ============================-->
    <header id="header">
        <div class="container-fluid">

            <div id="logo" class="pull-left" style=" height:70px; position:relative; top:-20px; ">
                <a href="#intro" class="scrollto"><img src="<?php echo base_url(); ?>/assets/img/ackko3.png" alt="" style="width:100%; height:100%;"></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="">Product</a>
                        <ul class="sub-menu">
                            <li><a href="tiffin_service.html">TIFFIN MANAGEMENT</a></li>
                            <li><a href="DMS.html">DAIRY MANAGEMENT</a></li>
                            <li><a href="food_delivery.html">FOOD DELIVERY APP</a></li>
                            <li><a href="Grocery _app.html">GROCERY APP</a></li>
                        </ul>
                    </li>
                    <li><a href="#portfolio">Portfolio</a></li>


                    <li><a href="#contact">Contact us</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->

            <nav class="mobo_menu" style="overflow: auto;">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="">Product</a>
                        <ul class="sub-menu">
                            <li><a href="tiffin_service.html">TIFFIN MANAGEMENT</a></li>
                            <li><a href="DMS.html">DAIRY MANAGEMENT</a></li>
                            <li><a href="food_delivery.html">Food Delivery</a></li>
                            <li><a href="Grocery _app.html">GROCERY APP</a></li>
                        </ul>
                    </li>

                    <li><a href="#portfolio">Portfolio</a></li>


                    <li><a href="#contact">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- #header -->

    <!--==========================
    Intro Section
  ============================-->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="<?php echo base_url(); ?>/assets/img/intro-carousel/1.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>We are professional</h2>
                                <p>We are the team of professionals in technology, we work professionally with our clients and deliver the best quality products as per their needs.</p>
                                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="<?php echo base_url(); ?>/assets/img/intro-carousel/2.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Planning and strategy</h2>
                                <p>Our core focus is everything should be planned and strategic for the work so that result-oriented product could develop.</p>
                                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="<?php echo base_url(); ?>/assets/img/intro-carousel/3.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Accessibility support</h2>
                                <p>Our doors are always open to serve you, even after delivering the project. You can bank upon our support. We ensure 100% customer satisfaction.</p>
                                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="<?php echo base_url(); ?>/assets/img/intro-carousel/4.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Clean code structure</h2>
                                <p>Our manual coding always ensures quality, structure and cleanliness. We create a website with ultra-speed and having a pleasing experience with global best practices.</p>
                                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="<?php echo base_url();  ?>/assets/img/intro-carousel/5.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Software integration </h2>
                                <p>We integrate your design into fully functional, fast loading Html, Dhtml, Php, Asp, Asp.net, Javascript, Ajax, XML, C#.Platforms: Windows, Unix, Linux. Databases: Mysql etc.</p>
                                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

            </div>
        </div>
    </section>
    <!-- #intro -->

    <main id="main">

        <!--==========================
      Featured Services Section
    ============================-->
        <section id="featured-services">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 box">
                        <i class="ion-ios-bookmarks-outline"></i>
                        <h4 class="title"><a href="">100% Satisfaction</a></h4>
                        <p class="description">We ensure 100% customer satisfaction</p>
                    </div>

                    <div class="col-lg-4 box box-bg">
                        <i class="ion-ios-stopwatch-outline"></i>
                        <h4 class="title"><a href="">Project Deadline</a></h4>
                        <p class="description">We complete the projects before the deadline we give.</p>
                    </div>

                    <div class="col-lg-4 box">
                        <i class="ion-ios-heart-outline"></i>
                        <h4 class="title"><a href="">Peoples Love us</a></h4>
                        <p class="description">People love us for our best quality work and service.</p>
                    </div>

                </div>
            </div>
        </section>
        <!-- #featured-services -->

        <!--==========================
      About Us Section
    ============================-->
        <section id="about">
            <div class="container">

                <header class="section-header">
                    <h3>About Us</h3>
                    <h5 style="text-align:center;">We welcome you to Ackko Technosoft Solution.</h5>
                    <p style="margin-bottom:0px;">
                        We are a truly worldwide, value driven, customer focussed, fast growing IT company located at Bhopal (MP), India. In service offering, we provide web designing and development, custom websites solutions, desktop and mobile application solutions with the
                        range of organizations, from small consultancies and organisations to large companies.</p>
                    <div id="about_hide_div" style="display:none; margin-bottom:0px;">
                        <h5 style="text-align:center;">Background history and Functional Areas.</h5>
                        <p style="margin-bottom:0px;">Ackko Technosoft was founded by an IT Professional with a zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city. Eventually, he sensed some shortcomings to the web world in various
                            organizations and decided to revolutionise the web market with their innovative service approaches. Started our journey from web/web-application designing/development and then we covered up the Mobile application solutions,
                            virtual-Real application designing/development as well. Our team of well qualified and extremely know-ledged professionals continuously strives to spread prominent web/web-application services to a diverse set of clients and
                            the public. We ceaselessly always look forward to updating our knowledge, experiences and skills to fight up with new challenges and threats at the technological level and in the market. We are unceasingly working to strengthen
                            our technical power to meet the latest technologies & concepts with high service standards in terms of web-solutions & technology all over the world.
                        </p>
                    </div>
                    <div style="width:100px; height:; margin:auto; padding-bottom:30px;"><button class="btn btn-primary" id="about_bt">Read More</button></div>
                </header>

                <div class="row about-cols">

                    <div class="col-md-4 wow fadeInUp">
                        <div class="about-col">
                            <div class="img">
                                <img src="<?php echo base_url(); ?>/assets/img/about-mission.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Mission</a></h2>
                            <p>
                                Ackko Technosoft Pvt ltd was founded by an IT Professional with zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city.
                            </p><br>
                        </div>
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="about-col">
                            <div class="img">
                                <img src="<?php echo base_url(); ?>/assets/img/about-plan.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-list-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Plan</a></h2>
                            <p>
                                Started our journey from web-application designing/development we are striving up to Mobile application solutions, digital marketing, Graphic Designing, E-commerce and artificial intelligence as well.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="about-col">
                            <div class="img">
                                <img src="<?php echo base_url(); ?>/assets/img/about-vision.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Our Vision</a></h2>
                            <p>
                                We are unceasingly working to strengthen our technical power to meet the latest technologies & concepts with high service standards in terms of web-solutions & technology all over the world.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- #about -->

        <!--==========================
      Services Section
    ============================-->
        <section id="services">
            <div class="container">

                <header class="section-header wow fadeInUp">
                    <h3>Services</h3>
                    <p></p>
                </header>

                <div class="row">

                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                        <h4 class="title"><a href="">Web design & Development </a></h4>
                        <p class="description">Web design & development by us are always loved by our clients because of its unique effect of attraction and very good quality content. </p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
                        <h4 class="title"><a href="">Artificial Intelligence </a></h4>
                        <p class="description">We are striving to Artificial intelligence (AI) which is an area of computer science that emphasizes the creation of intelligent machines that work and react like humans.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-paper-outline"></i></div>
                        <h4 class="title"><a href="">Digital Marketing</a></h4>
                        <p class="description">Social Media Marketing, SEO, SEM, SMO, Google Ad words, E-Mail Marketing, PPC Campaign. We offer 360 degrees in Digital Marketing Solutions.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                        <h4 class="title"><a href="">Mobile App Development</a></h4>
                        <p class="description">We build mobile apps for Android & IOS Operating System in all kind of screen size. Our approach is to use world-class technology with global practises. </p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
                        <h4 class="title"><a href="">Graphic Designing</a></h4>
                        <p class="description">We make excellent logos, brochures, wedding cards, marketing templates, and much more. We convert creative thoughts into creative designs.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-people-outline"></i></div>
                        <h4 class="title"><a href="">E-Commerce Development</a></h4>
                        <p class="description">We keep you equipped to develop a perfect Electronic-Store and to make your e-commerce business more custom to connect with a lot of consumers on the cloud.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                        <h4 class="title"><a href="">Business Outsourcing </a></h4>
                        <p class="description">We have a team of professionals who communicate well to the customers in support, we are strongly focused on quality and customer satisfaction in BO.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                        <h4 class="title"><a href="">Data Digitization </a></h4>
                        <p class="description">A complete data digitization service to transform the manual data, Govt or private organization documents into digital platforms.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="icon"><i class="ion-ios-people-outline"></i></div>
                        <h4 class="title"><a href="">Consultancy</a></h4>
                        <p class="description">We work to improve the structure and efficiency of IT systems. We advise our clients about how to use information technology to meet their business objectives or overcome problems.</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- #services -->

        <!--==========================
      Call To Action Section
    ============================-->
        <section id="call-to-action" class="wow fadeIn">
            <div class="container text-center">
                <h3>Call To Us</h3>
                <p> We also help you in Payment managements, Integrating communications, data management, Big data analytics and security.</p>
                <a class="cta-btn" href="#">Call To Us</a>
            </div>
        </section>
        <!-- #call-to-action -->

        <!--==========================
      Skills Section
    ============================-->
        <section id="skills">
            <div class="container">

                <header class="section-header">
                    <h3>Our Skills</h3>
                    <p>We develop products using various technologies and our developed products work in a very efficient manner worldwide. We have zero clients dropout rate since we have started our journey.</p>
                </header>

                <div class="skills-content">

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">HTML <i class="val">100%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">CSS <i class="val">90%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">JavaScript <i class="val">75%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">Photoshop <i class="val">55%</i></span>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!--==========================
      Facts Section
    ============================-->
        <section id="facts" class="wow fadeIn">
            <div class="container">

                <header class="section-header">
                    <h3>Facts</h3>
                    <p></p>
                </header>

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">274</span>
                        <p>Clients</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">421</span>
                        <p>Projects</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">1,364</span>
                        <p>Hours Of Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">18</span>
                        <p>Hard Workers</p>
                    </div>

                </div>

                <div class="facts-img">
                    <img src="<?php echo base_url(); ?>/assets/img/facts-img.png" alt="" class="img-fluid">
                </div>

            </div>
        </section>
        <!-- #facts -->

        <!--==========================
      Portfolio Section
    ============================-->
        <section id="portfolio" class="section-bg">
            <div class="container">

                <header class="section-header">
                    <h3 class="section-title">Our Portfolio</h3>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-erp">ERP</li>
                            <li data-filter=".filter-card">E-commerce</li>
                            <li data-filter=".filter-web">Websites</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/1.png"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/1.png" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="https://www.jivaansathi.com" target="_blank">JivaanSathi</a></h4>
                                <p>Website</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/urban.png"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/urban.png" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="https://urbantohfa.com" target="_blank">UrbanTohfa</a></h4>
                                <p>Website</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-6 portfolio-item filter-erp wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/vp.png"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/vp.png" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="https://ackko.com/vperp.ackko.com" target="_blank">Vyas Products</a></h4>
                                <p>ERP</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/1111.png"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/1111.png" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="http://shubhutsav.in" target="_blank">Shubh Utsav</a></h4>
                                <p>Website</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/bhati.jpg"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/bhati.jpg" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="https://ackko.com/bhatishair2" target="_blank">Bhatis Hair</a></h4>
                                <p>Website</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <a href="img/portfolio/pg.png"> <img src="img/portfolio/pg.png" class="img-fluid" alt=""></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="http://pgconsultants.co.in">PG Consultants</a></h4>
                <p>Website</p>
              </div>
            </div>
          </div>-->


                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <a href="<?php echo base_url(); ?>/assets/img/portfolio/ngo.jpg"> <img src="<?php echo base_url(); ?>/assets/img/portfolio/ngo.jpg" class="img-fluid" alt=""></a>

                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="https://haryalilaye.com">Haryali Laye Seva Samiti</a></h4>
                                <p>Website</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- #portfolio -->

        <!--==========================
      Clients Section
    ============================-->
        <section id="clients" class="wow fadeInUp">
            <div class="container">

                <header class="section-header">
                    <h3>Our Clients</h3>
                </header>

                <div class="owl-carousel clients-carousel">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-1.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-2.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-3.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-4.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-5.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-6.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-7.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-8.png" alt="">
                    <img src="<?php echo base_url(); ?>/assets/img/clients/client-9.png" alt="">
                </div>

            </div>
        </section>
        <!-- #clients -->

        <!--==========================
      Clients Section
    ============================-->
        <section id="testimonials" class="section-bg wow fadeInUp">
            <div class="container">



                <header class="section-header">
                    <h3>Testimonials</h3>
                </header>

                <div class="owl-carousel testimonials-carousel">

                    <div class="testimonial-item">
                        <img src="<?php echo base_url(); ?>/assets/img/vik.jpg" class="testimonial-img" alt="">
                        <h3>Vikram Patidar
                        </h3>
                        <h4>Ceo &amp; Creative Creation</h4>
                        <p>
                            <img src="<?php echo base_url(); ?>/assets/img/quote-sign-left.png" class="quote-sign-left" alt=""> I'd say that the team are excellent and it is some of the best services I have received both online and offline in a long time. If you would like a professional
                            experience from an excellent software company then I would look no further. They offer budgeted prices, but the service from a large company - which is an excellent combination.

                            <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>



                    <div class="testimonial-item">
                        <img src="<?php echo base_url(); ?>/assets/img/jiv.jpg" class="testimonial-img" alt="">
                        <h3>Aslam Khan (CEO)
                        </h3>
                        <h4>Jivaansathi.com</h4>
                        <p>
                            <img src="<?php echo base_url(); ?>/assets/img/quote-sign-left.png" class="quote-sign-left" alt=""> I must say working with Ackko Technosoft Pvt. Ltd. & his team has been a pleasure. They took some broken code done by an earlier Company, streamlined it, &
                            added some improvements. The site is more professional and faster! Great Job! They get the job done and they do good work.
                            <img src="<?php echo base_url(); ?>/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>



                </div>


            </div>
        </section>
        <!-- #testimonials -->



        <!--==========================
      Contact Section
    ============================-->
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">

                <div class="section-header">
                    <h3>Contact Us</h3>
                    <p></p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="ion-ios-location-outline"></i>
                            <h3>Address</h3>
                            <address>
                  Near Milan Restaurent, <br>MP Nagar, Zone-1, Bhopal(MP)
                  <!-- Plot No. E30-A, Green Medows City, Hosangabad Road, 
              Bhopal (MP) 462026 -->
             </address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="ion-ios-telephone-outline"></i>
                            <h3>Phone Number</h3>
                            <p><a href="#">+91 8269763363 <br>+91 9098416867</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="ion-ios-email-outline"></i>
                            <h3>Email</h3>
                            <p><a href="www.info@ackko.com">info@ackko.com, sales@ackko.com</a></p>
                            <p><a href="www.ackkotechnosoft@gmail.com">ackkotechnosoft@gmail.com</a></p>
                        </div>
                    </div>

                </div>

                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section>
        <!-- #contact -->

    </main>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Ackko</h3>
                        <p>
                            We are a truly worldwide, value driven, customer focussed, fast growin IT company located at Bhopal (MP), India. In service offering, we provide web designing and development solutions with the range of organizations from small consultancies and organisations
                            to large companies.
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#intro">Home</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#about">About us</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#services">Services</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="privacy-policy.html">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Near Milan Restaurent, MP Nagar, Zone-1, Bhopal(MP)
                            <!-- Plot No. L-1,  Shankar Nagar, Opp. Parul Hospital, 6-1/2 No. Bus Stop, Bhopal(MP) 462011 -->
                            <br>
                            <strong>Phone:</strong>+91 8269763363, 9098416867 <br>
                            <strong>Email:</strong> info@ackko.com <br>
                            <strong>Email:</strong> sales@ackko.com <br>
                            <strong>Email:</strong> ackkotechnosoft@gmail.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>
                            Register Office - Plot No. E30-A, Green Meadows City, Hoshangabad Road, Bhopal (MP) 462026
                            <br>

                        </p>
                        <p>Getting a new technology update and being update forever for our offers kindy subscribe our newsletter here</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Ackko</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
                Best <a href="https://bootstrapmade.com/"></a> by Ackko
            </div>
        </div>
    </footer>
    <!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="<?php echo base_url(); ?>/assets/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/superfish/hoverIntent.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/superfish/superfish.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5afd78b35f7cdf4f05344e4a/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();


        $(document).ready(function() {

            $('button[id=about_bt]').click(function() {

                $('div[id=about_hide_div]').slideToggle(2000);

            });

            $('#mobile-nav-toggle').click(function() {
                var sidemenu_width = $('.mobo_menu').width();
                if (sidemenu_width == "0") {
                    $('.mobo_menu').show().animate({
                        width: 250,
                    });
                } else if (sidemenu_width == "220") {
                    $('.mobo_menu').hide(0).animate({
                        width: 0,
                    });
                }
            });

        });
    </script>


</body>

</html>