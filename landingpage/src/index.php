<!DOCTYPE html>
<html lang="en">
<!-- php to count for data in the pages -->
<?php 
include '../../pages/action/connection.php';

$voluteers = mysqli_query($connect, "SELECT * FROM volunteer");
$numofvol = mysqli_num_rows($voluteers);

$request = mysqli_query($connect, "SELECT * FROM request");
$numofreq = mysqli_num_rows($request);

$offers = mysqli_query($connect, "SELECT * FROM offer");
$numofoffer = mysqli_num_rows($offers);

$schools = mysqli_query($connect, "SELECT * FROM school");
$numofschool = mysqli_num_rows($schools);
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SchoolHELP</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart - v1.11.1
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!--HEADER START-->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center">
            <img src="../assets/img/logo.png" alt="">
            <span>SchoolHELP</span>
        </a>
        <!--NAVBAR START-->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>

                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="getstarted scrollto" href="../../pages/login.php">Get Started</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!--NAVBAR END-->
    </div>
</header>
<!--HEADER END-->

<!--HERO START-->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">We help kids who need to make up for "lost learning" </h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Especially those who lack the technical means to seek online education</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="../../pages/login.php"
                           class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="../assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>
<!--HERO END-->

<main id="main">
    <!--ABOUT START-->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Who We Are</h3>
                        <h2>We provide a way for schools to request help from the general public
                        </h2>
                        <p>
                            In the SchoolHELP website, schools will be able to request help in the form of a device or tutorial for education purposes. The request the schools have made will be able to be seen by a volunteer, if the volunteer is interested to help the school, they can offer their help.
                        </p>
                        <p>
                            By providing a way for school to request help and volunteer to help the school, we aim to provide a better education for the students.

                        </p>
                        <div class="text-center text-lg-start">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="../assets/img/about.jpg" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section>
    <!--ABOUT END-->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

        <div class="container" data-aos="fade-up">
        </div>

    </section><!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $numofvol ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Volunteers</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $numofreq ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Requests Assistance</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-headset" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $numofoffer ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Offers</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $numofschool ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Schools</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Features</h2>
                <p>A School Like None Other</p>
            </header>

            <div class="row">

                <div class="col-lg-6">
                    <img src="../assets/img/features.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Register School</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Submit Request</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Register as Volunteer</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>View Requests</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Submit Offer</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Review Offers</h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- / row -->

            <!-- Feature Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6">
                    <h3>Our Project Objectives</h3>

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Present</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab2">Future</a>
                        </li>
<!--                        <li>-->
<!--                            <a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a>-->
<!--                        </li>-->
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab1">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <p>
                                    To create a website that is easy to use, which user should be able to learn within 10 minutes of using the website.
                                </p>
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <p>
                                    To complete the project without going over the initial budget.
                                </p>
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>

                                <p>
                                    To successfully create and launch a usable website by the end of December 2022
                                </p>
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <p>
                                    To become a website which all schools can use to request, and for the general public to volunteer.
                                </p>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <p>
                                    To become a website that will help improve the quality of education for the students.
                                </p>
                            </div>





                        </div><!-- End Tab 1 Content -->

<!--                        <div class="tab-pane fade show" id="tab2">-->
<!--                            <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>-->
<!--                            <div class="d-flex align-items-center mb-2">-->
<!--                                <i class="bi bi-check2"></i>-->
<!--                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>-->
<!--                            </div>-->
<!--                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>-->
<!--                            <div class="d-flex align-items-center mb-2">-->
<!--                                <i class="bi bi-check2"></i>-->
<!--                                <h4>Incidunt non veritatis illum ea ut nisi</h4>-->
<!--                            </div>-->
<!--                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem-->
<!--                                quo tempora. Quia et perferendis.</p>-->
<!--                        </div>-->
                        <!-- End Tab 2 Content -->

<!--                        <div class="tab-pane fade show" id="tab3">-->
<!--                            <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>-->
<!--                            <div class="d-flex align-items-center mb-2">-->
<!--                                <i class="bi bi-check2"></i>-->
<!--                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>-->
<!--                            </div>-->
<!--                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>-->
<!--                            <div class="d-flex align-items-center mb-2">-->
<!--                                <i class="bi bi-check2"></i>-->
<!--                                <h4>Incidunt non veritatis illum ea ut nisi</h4>-->
<!--                            </div>-->
<!--                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem-->
<!--                                quo tempora. Quia et perferendis.</p>-->
<!--                        </div>-->
                        <!-- End Tab 3 Content -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <img src="../assets/img/features-2.png" class="img-fluid" alt="">
                </div>

            </div><!-- End Feature Tabs -->


        </div>

    </section><!-- End Features Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="../assets/img/team/1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>I Nyoman Surya Pradipta</h4>
                            <span>Project Leader</span>
                            <p>Knowledge is power</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="../assets/img/team/2.png" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Made Dhiyo Raditya Diarsha</h4>
                            <span>Team Member</span>
                            <p>Make it work, make it right, make it fast.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="../assets/img/team/3.png" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>I Wahyu Purna Astawa</h4>
                            <span>Team Member</span>
                            <p>Simplicity is the soul of efficiency.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <div class="member-img">
                            <img src="../assets/img/team/4.png" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>...</h4>
                            <span>Coming Soon</span>
                            <p>....</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <!-- <section id="clients" class="clients">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Our Clients</h2>
                <p>All services at times</p>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="../assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section> -->
    <!-- End Clients Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>
                                    Jl. Raya Puputan No.86<br>Dangin Puri Klod, Kota Denpasar,
                                    Bali 80234. Indonesia
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+62 812345678</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>dhiyo.rd@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="../forms/contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">


    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <img src="../assets/img/logo.png" alt="">
                        <span>SchoolHELP</span>
                    </a>
                    <p>We help kids who need to make up for "lost learning" 
                        Especially those who lack the technical means to seek online education</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#team">Team</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="../../pages/login">Get Started</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#features">Submit Resource Request</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#features">Submit Tutorial Request</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#features">Submit Offer</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Jl. Raya Puputan No.86<br>
                        Dangin Puri Klod, Kota Denpasar, Bali 80234<br>
                        Indonesia<br><br>
                        <strong>Phone:</strong> +62 812345678<br>
                        <strong>Email:</strong> dhiyo.rd@gmail.com<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>SchoolHELP</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>