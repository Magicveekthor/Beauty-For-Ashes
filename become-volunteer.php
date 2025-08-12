<?php
#include the email.php
include_once "email.php";

if(isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);

    $volunteerArray = isset($_POST['volunteer']) ? $_POST['volunteer'] : [];
    # Filter each value in the array
    $volunteerArray = array_map(function($item) {
        return filter_var($item, FILTER_SANITIZE_STRING);
    }, $volunteerArray);
    # Convert to comma-separated string
    $volunteer = implode(' , ', $volunteerArray);

    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    //Send Volunteer message
    sendvolunteer($name, $email, $phone, $address, $gender, $volunteer, $message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Become a Volunteer || Beauty For Ashes</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/resources/logo.png" />
    <meta name="description" content="Beauty For Ashes" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;family=Fredoka+One&amp;display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="assets/css/virtual-select.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/pifoxen-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/pifoxen.css" />
    <link rel="stylesheet" href="assets/css/pifoxen-responsive.css" />
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="60" src="assets/images/loader.png" alt="" />
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper clearfix">
                    <div class="main-menu-wrapper__left">
                        <div class="main-menu-wrapper__logo">
                            <a href="index.html" aria-label="Logo"><img src="assets/images/resources/logo.png" alt=""></a>
                        </div>
                        <div class="main-menu-wrapper__call">
                            <div class="main-menu-wrapper__call-icon">
                                <span class="icon-call"></span>
                            </div>
                            <div class="main-menu-wrapper__call-number">
                                <p>Call Anytime</p>
                                <h5><a href="tel:+301 316 8913">+301 316 8913</a></h5>
                                <h5><a href="tel:+234 816 686 9525">+234 816 686 9525</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler" aria-label="Links"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="dropdown megamenu">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="about.html">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="gallery.html">Gallery</a>
                            </li>
                            <li class="dropdown">
                                <a href="become-volunteer.php">Volunteer</a>
                            </li>
                            <li class="dropdown">
                                <a href="donate-now.php">Donations</a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="blog.html">Blog</a>
                            </li> -->
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg volunteer"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Become a Volunteer</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Volunteers</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Become Volunteer Start-->
        <section class="become-volunteer">
            <div class="container">
                <div class="row">
                    <h3 class="become-volunteer__title">Become a Volunteer</h3>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="become-volunteer__Left">
                            <div class="become-volunteer__images">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                        <div class="become-volunteer__img-single">
                                            <img src="assets/images/resources/become-volunteer-img-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                        <div class="become-volunteer__img-single">
                                            <img src="assets/images/resources/become-volunteer-img-2.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="become-volunteer__content">
                                <div class="become-volunteer__contact">
                                    <p>
                                        <a href="tel:+301 316 8913" class="become-volunteer__phone">+301 316 8913 (Headquarters)</a>
                                        <a href="tel:+301 316 8913" class="become-volunteer__phone">+234 816 686 9525 (Nigeria)</a>
                                        <a href="mailto:admin@beautyforashesint.org"
                                            class="become-volunteer__email">admin@beautyforashesint.org</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="become-volunteer__right">
                            <form class="become-volunteer__form" method="post">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="become-volunteer__input">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer__input">
                                            <input type="email" placeholder="Email Address" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer__input">
                                            <input type="text" placeholder="Phone Number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer__input">
                                            <input type="text" placeholder="Address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <select name="gender" title="gender">
                                                <option value="" disabled selected>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select><!-- /# -->
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                       <div class="comment-form__input-box">
                                            <select class="vscomp-ele" multiple id="multipleSelect" name="volunteer[]" placeholder="Please Tick Your Desired Area(s) Of Participation" data-search="false" data-silent-initial-value-set="true">
                                                <option value="Prayer Partner">Prayer Partner</option>
                                                <option value="Financial Partner">Financial Partner</option>
                                                <option value="Expertise Partner">Expertise Partner</option>
                                                <option value="Administrative Partner">Administrative Partner</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xl-12">
                                        <div class="become-volunteer__input become-volunteer__message-box">
                                            <textarea name="message" placeholder="If Others...Kindly indicate here"></textarea>
                                        </div>
                                        <div class="become-volunteer__btn-box">
                                            <button name="submit" class="thm-btn become-volunteer__btn" id="open-modal">Join The Team!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Become Volunteer End-->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer-bg" style="background-image: url(assets/images/backgrounds/site-footer-bg.jpg);">
            </div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-text-box">
                                    <p class="footer-widget__about-text">Your Donations can Change their Daily Life
                                        Style</p>
                                </div>
                                <a href="donate-now.php" class="donate-btn footer-donate__btn"> <i
                                        class="fa fa-heart"></i>
                                    Donate Now</a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__links clearfix">
                                <h3 class="footer-widget__title">Links</h3>
                                <ul class="footer-widget__links-list list-unstyled clearfix">
                                    <li><a href="donations.html">Donations</a></li>
                                    <li><a href="about.html">About us</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact clearfix">
                                <h3 class="footer-widget__title">Contact</h3>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-email"></span>
                                        </div>
                                        <div class="text">
                                            <a href="mailto:admin@beautyforashesint.org">admin@beautyforashesint.org</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="text">
                                            <a href="tel:+301 316 8913"> +301 316 8913 (Headquarters)</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="text">
                                            <a href="tel:+234 816 686 9525"> +234 816 686 9525 (Nigeria)</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact clearfix">
                                <h3 class="footer-widget__title">Location</h3>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-pin"></span>
                                        </div>
                                        <div class="text">
                                            <p><strong>HEADQUARTERS</strong> <br>12217 Kings Arrow Street, Bowie, MD, 20721</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-pin"></span>
                                        </div>
                                        <div class="text">
                                            <p><strong>NIGERIA</strong> <br> 48 Awolowo Road, Tanke, Ilorin, Kwara state, Nigeria</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <p class="site-footer__bottom-text">© Copyright <script>document.write(new Date().getFullYear());</script> by <a class="author" href="https://www.magicveekthor.com">Magic Veekthor</a>
                                </p>
                                <div class="site-footer__social">
                                    <a href="https://www.facebook.com/profile.php?id=61557053611098&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/beautyforashes_min?igsh=aXFkYmIzajRjc2gx" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://api.whatsapp.com/send/?phone=%2B2348166869525&text&type=phone_number&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo.png" style="height: 100px;" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:admin@beautyforashesint.org">admin@beautyforashesint.org</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+301 316 8913"> +301 316 8913</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+234 816 686 9525">+234 816 686 9525</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="https://www.facebook.com/profile.php?id=61557053611098&mibextid=ZbWKwL"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/beautyforashes_min?igsh=aXFkYmIzajRjc2gx"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <script src="assets/vendors/jquery/jquery-3.6.1.min.js"></script>
    <script src="assets/js/virtual-select.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/timepicker/timePicker.js"></script>

       <script type="text/javascript">
            VirtualSelect.init({ 
                ele: '#multipleSelect' 
            });
        </script>
    <!-- template js -->
    <script src="assets/js/pifoxen.js"></script>
</body>
</html>