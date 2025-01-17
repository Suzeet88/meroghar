
<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mero Ghar - Find your dream home </title>
    <link rel="shortcut icon" href="img/mero_ghar_favicon.png" type="image/png">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">

    

     <!-- font family -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

<header class="header flex justify-content align-items-center">
         <a href="#" class="mero_ghar_favicon"><img src="img/mero_ghar.png" alt="mero ghar real estate" type="image/png"> </a>

         <nav class="main_nav">
             <ul class="main-nav-list flex">
                 <li><a href="index.php" class="main-nav-link">Home</a></li>
                 <li><a href="property.php" class="main-nav-link">Properties</a></li>
                 <li><a href="agent.php" class="main-nav-link">Agents</a></li>
                 <li><a href="about.php" class="main-nav-link">About Us</a></li>
             </ul>
         </nav>

            <div class="post_login flex">
               
                <a href="addProperty.php" class="btn property-btn" id="addPropertyLink">Add Property</a>
                
              

                <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo "
               
                    <div class='user'>
                         <span>🙎🏻‍♂️| $_SESSION[username]</span>
                        <a href='logout.php'>LogOut</a>
                    </div>

                ";
        }
         else 
         {
            echo "
                <div class='sign-in-up'>
                    <button type='button' class='show_sign_login  show_login' onclick=\"togglePopup('login-popup')\">Signup</button>
                    <button type='button' class='show_sign_login  show_register' onclick=\"togglePopup('register-popup')\">Register</button>
                </div>
            ";
        }
        ?>
            </div>



     </header>



     
       <!-- Login and Register Container -->

<!-- Login Modal -->
<div id="login-popup" class="modal">
    <div class="modal-content">
        <h2>
            <span>User Login</span>
            <button type="button" onclick="togglePopup('login-popup')"><ion-icon name="close-outline" class='close-icon'></ion-icon></button>
        </h2>
        <form method="post" action="login_register.php" class="form-container">
            <input type="text" placeholder="Email or Username" name="email_username" required />
            <input type="password" placeholder="Password" name="password" required />
            <button type="submit" class="login-btn" name="login">Login</button>
        </form>
    </div>
</div>

<!-- Register Modal -->
<div id="register-popup" class="modal">
    <div class="modal-content">
        <h2>
            <span>User Register</span>
            <button type="button" onclick="togglePopup('register-popup')"><ion-icon name="close-outline" class='close-icon'></ion-icon></button></button>
        </h2>
        <form method="post" action="login_register.php" class="form-container">
            <input type="text" placeholder="Full Name" name="fullname" required />
            <input type="text" placeholder="Username" name="username" required />
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" required />
            <button type="submit" name="register" class="register-btn">Register</button>
        </form>
    </div>
</div>


<main>


        <!-- hero section -->
    
     <section class="hero-section">
             <div class="container hero flex justify-content">
                     <div class="hero-content">
                       <h1 class="hero-title title">Find a <span class="span-text">place</span> where you can be <span class="span-text">yourself</span></h1>
                       <p class="hero-description description">
                        If you're looking for a place where you can be yourself, don't give up. Keep searching until you find a place that feels like home.
                       </p>
                       <a href="property.php" class="hero-btn btn about-btn property-btn">Check Property</a>
                   <div class="delivered-meals">
                  <div class="delivered-img">
                      <img src="img/uifaces-human-image (1).jpg" alt="customer photo">
                      <img src="img/uifaces-human-image (2).jpg" alt="customer photo">
                      <img src="img/uifaces-human-image (3).jpg" alt="customer photo">
                      <img src="img/uifaces-human-image (4).jpg" alt="customer photo">
                      <img src="img/uifaces-human-image (5).jpg" alt="customer photo">
                      <img src="img/uifaces-human-image (6).jpg" alt="customer photo">
                    </div>
                   <div>
                    <p class="delivered-text"><span>2000+</span> happy customers</p>
                  </div>
              </div>
                        
                     </div>  
                     <div class="hero-img">
                            <img src="img/hero.png" alt="hero image">
                     </div>
                  </div>
             </div>
         </section>




          <!-- how it works section -->

          <section class="how-section reveal">
                   <div class="how-header">
                        <h1 class="text-center underline_transition">How <span class="span-text">it</span> works</h1>
                   </div>
              <div class="container how-container flex">
                     <div class="how-box text-center">
                         <img src="img/merogharagent.png" alt="mero ghar agent">
                          <h3 class="how-title"><span class="span-text">Buy</span> a home</h3>
                          <p class="how-description description">Find your ideal home with ease—browse diverse listings tailored to you.</p>
                          <a href="agent.php" class="btn how-btn show_sign_login">Check agent</a>
                     </div>
                     <div class="how-box text-center">
                         <img src="img/merogharsell.png" alt="mero ghar sell">
                          <h3 class="how-title"><span class="span-text">Sell</span> a home</h3>
                          <p class="how-description description">List your property quickly and connect with buyers across Nepal.</p>
                          <a href="addProperty.php" class="btn how-btn show_sign_login">Add property</a>
                     </div>
                     <div class="how-box text-center">
                         <img src="img/merogharagent.png" alt="mero ghar rent">
                          <h3 class="how-title"><span class="span-text">Rent</span> a home</h3>
                          <p class="how-description description">Discover rentals that fit your lifestyle and budget effortlessly.</p>
                          <a href="property.php" class="btn how-btn show_sign_login">Find rentals</a>
                     </div>
                    
                     
              </div>
         </section>



          <!-- about us section -->

          <section class="about-section reveal">
            <div class="container about-container flex">
                 <div class="about-img">
                      <img src="img/feature-banner-2.jpg" alt="this is image explain about us">
                 </div>
                 <div class="about-content flex">
                    <h1 class="about-title title">Building <span class="span-text">Dreams</span>  Together</h1>
                    <p class="about-description description">At Mero Ghar, <span class="span-text">we connect dreams with reality.</span> Our platform brings together property seekers and sellers, offering a seamless experience in finding, listing, and renting properties across Nepal.</p>
                    <a href="about.php" class="btn about-btn property-btn">Learn more</a>
                 </div>
            </div>
     </section>



        <!-- latest property section -->

        <section class="latest-section reveal">
            <div class="how-header">
                <h1 class="text-center underline_transition"><span class="span-text">Exculsive</span> properties</h1>
           </div>

           <div class="container latest-container">
           

        
            
            <div class="property-box">
              
                 <span class="status">Rent</span>
              <div class="property-box-img">
                  <img src="img/property-1.jpg" alt="property for sell/rent">
              </div>
              <div class="property-box-content flex">
                   <div class="property-address flex align-items-center flex-gap-icons">
                    <ion-icon name="location-outline"></ion-icon>
                    <p>Pokhara,Kavre</p>
                   </div>
                    <div class="property-name flex justify-content align-items-center">
                        <div class="sqaure-feet flex flex-gap-icons align-items-center">
                            <ion-icon name="person-outline" class="property-icons"></ion-icon>
                            <p>Prayush Sah</p>
                           </div>
    
                           <div class="sqaure-feet flex flex-gap-icons align-items-center">
                            <ion-icon name="home-outline" class="property-icons"></ion-icon>
                            <p>7526</p>
                           </div>   
                    </div>
                   <div class="property-details flex justify-content align-items-center">
                       <div class="sqaure-feet flex flex-gap-icons align-items-center">
                        <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                         <p>650 sqf</p>
                       </div>
    
                       <div class="beds flex flex-gap-icons align-items-center">
                        <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                        <p>4 Beds</p>
                       </div>
    
                        <div class="baths flex flex-gap-icons align-items-center">
                            <ion-icon name="accessibility-outline" class="property-icons"></ion-icon>
                            <p>4 Baths</p>
                        </div>
    
                   </div>
                   
                   <div class="property-owner flex justify-content align-items-center">
                    <p>$2500,000</p>
                    <a href="agent.php" class="more-btn property-btn">Check Agents</a>
                   </div>
              </div>
         </div>



         <div class="property-box">
          
             <span class="status">Rent</span>
          <div class="property-box-img">
              <img src="img/property-2.jpg" alt="property for sell/rent">
          </div>
          <div class="property-box-content flex">
               <div class="property-address flex align-items-center flex-gap-icons">
                <ion-icon name="location-outline"></ion-icon>
                <p>Baneshwor,Kathmandu</p>
               </div>
                <div class="property-name flex justify-content align-items-center">
                    <div class="sqaure-feet flex flex-gap-icons align-items-center">
                        <ion-icon name="person-outline" class="property-icons"></ion-icon>
                        <p>Prayush Sah</p>
                       </div>

                       <div class="sqaure-feet flex flex-gap-icons align-items-center">
                        <ion-icon name="home-outline" class="property-icons"></ion-icon>
                        <p>7526</p>
                       </div>   
                </div>
               <div class="property-details flex justify-content align-items-center">
                   <div class="sqaure-feet flex flex-gap-icons align-items-center">
                    <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                     <p>800 sqf</p>
                   </div>

                   <div class="beds flex flex-gap-icons align-items-center">
                    <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                    <p>4 Beds</p>
                   </div>

                    <div class="baths flex flex-gap-icons align-items-center">
                        <ion-icon name="accessibility-outline" class="property-icons"></ion-icon>
                        <p>4 Baths</p>
                    </div>

               </div>
               
               <div class="property-owner flex justify-content align-items-center">
                <p>$2500,000</p>
                <a href="agent.php" class="more-btn property-btn">Check Agents</a>
               </div>
          </div>
     </div>


     <div class="property-box">
        
         <span class="status">Rent</span>
      <div class="property-box-img">
          <img src="img/property-3.jpg" alt="property for sell/rent">
      </div>
      <div class="property-box-content flex">
           <div class="property-address flex align-items-center flex-gap-icons">
            <ion-icon name="location-outline"></ion-icon>
            <p>Koteshwor,Kathmandu</p>
           </div>
            <div class="property-name flex justify-content align-items-center">
                <div class="sqaure-feet flex flex-gap-icons align-items-center">
                    <ion-icon name="person-outline" class="property-icons"></ion-icon>
                    <p>Prayush Sah</p>
                   </div>

                   <div class="sqaure-feet flex flex-gap-icons align-items-center">
                    <ion-icon name="home-outline" class="property-icons"></ion-icon>
                    <p>7526</p>
                   </div>   
            </div>
           <div class="property-details flex justify-content align-items-center">
               <div class="sqaure-feet flex flex-gap-icons align-items-center">
                <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                 <p>750 sqf</p>
               </div>

               <div class="beds flex flex-gap-icons align-items-center">
                <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                <p>4 Beds</p>
               </div>

                <div class="baths flex flex-gap-icons align-items-center">
                    <ion-icon name="accessibility-outline" class="property-icons"></ion-icon>
                    <p>4 Baths</p>
                </div>

           </div>
           
           <div class="property-owner flex justify-content align-items-center">
            <p>$2500,000</p>
            <a href="agent.php" class="more-btn property-btn">Check Agents</a>
           </div>
      </div>
 </div>

</div>
    </div>
        </section>



<!-- Testimonials Section -->
<section class="testimonials-section reveal">
    <div class="how-header">
        <h1 class="text-center underline_transition">Our <span class="span-text">happy</span> homeowners</h1>
    </div>

    <div class="slider">
        <div class="slide" data-slide="1">
            <div class="testimonials-box">
                <img src="img/uifaces-popular-image (2).jpg" alt="review of user">
                <p class="testimonials-description">Finding my first home felt overwhelming until I used Mero Ghar. The website was easy to navigate, and I quickly found properties in my budget and location.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <h3 class="testimonials-title">Prayush Kumar Sah</h3>
                <p class="testimonials-address">Kathmandu, Nepal</p>
            </div>
        </div>

        <div class="slide" data-slide="2">
            <div class="testimonials-box">
                <img src="img/uifaces-popular-image.jpg" alt="review of user">
                <p class="testimonials-description">I needed a rental that suited my lifestyle and budget, and Mero Ghar delivered. I found a great apartment within days.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <h3 class="testimonials-title">Rijan Lakhe Shrestha</h3>
                <p class="testimonials-address">Bhaktapur, Nepal</p>
            </div>
        </div>

        <div class="slide" data-slide="3">
            <div class="testimonials-box">
                <img src="img/uifaces-popular-image (1).jpg" alt="review of user">
                <p class="testimonials-description">Mero Ghar made it easy to find a great place. The process was transparent and hassle-free.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <h3 class="testimonials-title">Gita Thapa</h3>
                <p class="testimonials-address">Chitwan, Nepal</p>
            </div>
        </div>

        <!-- Slider Controls -->
        <ion-icon name="arrow-back-outline" class="slider__btn slider__btn--left"></ion-icon>
        <ion-icon name="arrow-forward-outline" class="slider__btn slider__btn--right"></ion-icon>
    </div>
</section>


  <!-- frequently asked question -->

  <section class="FAQS-section reveal">

<div class="how-header">
    <h1 class="text-center underline_transition">Frequently <span class="span-text">Asked</span> Questions</h1>
  </div>

   <div class="FAQS-container">
         <div class="FAQS-box">
             <div class="FAQS-title flex justify-content align-items-center">
                 <h3>What is Mero Ghar?</h3>
                 <ion-icon name="chevron-down-outline" class="FAQS-icon"></ion-icon>
             </div>
             <div class="FAQS-descrption">
                  <p>Mero Ghar is a dedicated platform that connects buyers, sellers, and renters in the real estate market of Nepal, making property transactions easier and more accessible.</p>
             </div>
         </div>
         

         <div class="FAQS-box">
          <div class="FAQS-title flex justify-content align-items-center">
              <h3>How do I list my property on Mero Ghar?</h3>
              <ion-icon name="chevron-down-outline" class="FAQS-icon"></ion-icon>
          </div>
          <div class="FAQS-descrption">
               <p>To list your property, simply create an account on our website, navigate to the listing section, and fill out the required details about your property, including photos and pricing.</p>
          </div>
         </div>


         <div class="FAQS-box">
          <div class="FAQS-title flex justify-content align-items-center">
              <h3>Is there a cost to use Mero Ghar?</h3>
              <ion-icon name="chevron-down-outline" class="FAQS-icon"></ion-icon>
          </div>
          <div class="FAQS-descrption">
               <p>It is free to browse listings, but there may be costs for listing properties or additional premium services.</p>
          </div>
         </div>


         <div class="FAQS-box">
          <div class="FAQS-title flex justify-content align-items-center">
              <h3>Can I save listings to view later? </h3>
              <ion-icon name="chevron-down-outline" class="FAQS-icon"></ion-icon>
          </div>
          <div class="FAQS-descrption">
               <p>Yes, you can save listings by clicking on the heart icon and access them from your account.</p>
          </div>
         </div>
   </div>
 
</section>

</main>


<div class="top">
<a href="#"><ion-icon name="arrow-up-outline" class="top-icon"></ion-icon></a> 
</div>

<footer class="footer reveal">
<div class="container grid grid-footer">
  <div class="logo-col">
    <a href="#"><img src="img/mero_ghar.png" alt="omnifood-logo" class="logo"></a>
    
    <ul class="social-links">
       <li><a class="footer-link" href="#"><ion-icon class="social-icons" name="logo-instagram"></ion-icon></a></li>
       
       <li><a class="footer-link" href="#"><ion-icon class="social-icons" name="logo-facebook"></ion-icon></a></li>

       <li><a class="footer-link" href="#"><ion-icon class="social-icons"name="logo-twitter"></ion-icon></a></li>

       <li><a class="footer-link" href="#"><ion-icon class="social-icons" name="logo-linkedin"></ion-icon></a></li>

    </ul>
    <p class="copyright">© 2024 Mero Ghar. All rights reserved</p>
  </div>
  <div class="address-col">
     <p class="footer-heading">Contact us</p>
     <address class="contacts">
       <p class="address">New baneshwor,Kathmandu,Nepal</p>

       <p>
        <a class="footer-link" href="tel:415-201-6370">415-201-6370</a> <br>
        <a class="footer-link" href="mailto:hello@omnifood.com">Meroghar@gmail.com</a>
      </p>
     </address>
  </div>

  <nav class="nav-col">
     <p class="footer-heading">Account</p>
     <ul class="footer-nav">
       <li><a class="footer-link" href="#">Create account</a></li>
       <li><a class="footer-link" href="#">Sign up</a></li>
       <li><a  class="footer-link" href="#">IOS app</a></li>
       <li><a class="footer-link" href="#">Andriod app</a></li>
    </ul>
  </nav>
 
  
  <nav class="nav-col">
    <p class="footer-heading">Company</p>
    <ul class="footer-nav">
      <li><a class="footer-link" href="#">About Meroghar</a></li>
      <li><a class="footer-link" href="#">For Business</a></li>
      <li><a class="footer-link" href="#">Meroghar agent</a></li>
      <li><a class="footer-link" href="#">Testimonials</a></li>
   </ul>
 </nav>

        
 <nav class="nav-col">
  <p class="footer-heading">Legal Information</p>
  <ul class="footer-nav">
    <li><a class="footer-link" href="#">Terms & Conditions</a></li>
    <li><a class="footer-link" href="#">Privacy Policy</a></li>
    <li><a class="footer-link" href="#">Cookie Policy</a></li>
 </ul>
</nav>

</div>
</footer>



<script>
        // Pass the PHP login status to JavaScript as a variable
        let isLoggedIn = <?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ? 'true' : 'false'; ?>;
    </script>






      
    <!-- all javascript -->
    <script src="js/script.js"></script>

    
    
    
    <!-- icons source -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>