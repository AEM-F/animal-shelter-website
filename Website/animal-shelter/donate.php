<?php   
include 'includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Donate</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIKMiEng7L4L7NtK5lqI0Z1aFp-FwcZNU&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    </head>
    <body>
    
   
    <div class="backdrop"></div>
    <div class="user-info-format">
    <?php include 'includes/main-navigation.php'; ?>
    <div id="backdrop">
    
       
            <?php include 'includes/donate-payment.php'?>
        
        
    
    </div>
    
            <div class="user-info-section">
               <!-- The swiper thingie -->
        <div class="swiper-container">
            <div class="parallax-bg" style="background-image:url(https://p1cdn4static.civiclive.com/UserFiles/Servers/Server_1881137/Image/Residents/Animal%20Services/Animal-banner-4.jpg)"
                data-swiper-parallax="-23%"></div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="title" data-swiper-parallax="-300">A Second chance</div>
                    <div class="subtitle" data-swiper-parallax="-200">What are we trying to achieve?</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>We are working towards saving the lives of multiple cats, dogs, and other kind of animals. Our goal is to give pets a second chance and happy, habitual homes. </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="title" data-swiper-parallax="-300" data-swiper-parallax-opacity="0">Care</div>
                    <div class="subtitle" data-swiper-parallax="-200">How can you help?</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>
                        By donating a small amount, we will be able to provide animals with essencial products. Primarly cans of food, but also grooming care, and health care        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="title" data-swiper-parallax="-300">Our end-goal!</div>
                    <div class="subtitle" data-swiper-parallax="-200">What we have achieved</div>
                    <div class="text" data-swiper-parallax="-100">
                        <p>We implemented a gallery to introduce people to our pets that are available for adoption. Most of the animals on this website have an intersting past, which you can read about in their individual descriptions. We highly encourage you to take a look, as one of these lucky animals could be your new favorite family member.</p>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            
            <!-- Add Navigation -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>



                <!-- end of swiper thingie -->

        </div>


            

            <div class="user-info-about-top" id="aboutUs_Top">
            
                
                <h2>Want to help us?</h2>

                <p id="demo">
                As a group of people who want to help our four legged friends who are are struggling we ask of you to help them with us.
                Your gift today helps save lives
                Your contribution goes straight to work helping us feed and nurture animals - by supporting our activities and helping us provide medical care.    
            </p>

                
                
                </div>
            
                    
            <div class = "user-donation-box">
                <div class="user-donation-slider">
                   
                   <!-- <div class="swiper-donation-slider">
                    <div class="swiper-wrapper"> -->

                       <div class="swiper-donation-slide">
                           <h1>25$</h1>
                           <p> 4 packs of food </p>
                           <button class = "donation-button-style" onclick="on()"> donation</button>
                        </div>

                       <div class="swiper-donation-slide">
                       <h1>50$</h1>
                       
                       <p> 10 packs of food</p>
                           <button class = "donation-button-style" onclick="on()"> donation </button>
                        </div>


                        <div class="swiper-donation-slide">
                           <h1>100$</h1>
                           
                           <p>30 packs of food </p>
                           <button class = "donation-button-style" onclick="on()"> donation</button>
                        </div>
                        <div class="swiper-donation-slide">
                           <h1>Or choose yourself</h1>
                           <input class="donate-money-input">
                           <button class = "donation-button-style" onclick="on()"> donation</button>
                        </div>


                        
                       
                        
                      
            </div>
                        
                        
                    <!-- </div>
                   </div> -->
                </div>
                     
                     <!-- swiper-donation-pagination-white -->
            
                    <!-- <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-bone"></i>Safety</h1>
                        <p> To provide a welcoming place for all the troubled fourlegged guests in our pet shelter. We provide food,medicine and most of all safety in our animal shelter. </p>
                    </div>
                    <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-home"></i>Love</h1>
                        <p>Every animal in our four legged hotel is getting all the attention and love from our staff to encourage our little guests to shine with their enthusiasm and to be able to learn. </p>
                    </div>
                    <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-heart"></i>Interaction</h1>
                        <p> Most of our employees are experienced animal rescuers who had plenty of experience with nurturing and training animals. We also have many volunteers who are eager to learn and care for our little animal friends.  </p>
                    </div> -->

  
                    
                <div class="user-info-about-bot" id="aboutUs_Bottom">
                <h2 > What we want to give </h2>
                <div class="user-box-animalHome">
                <p>
                     * The donation will go to purchase food and medicine .<br>
                     * We try to use your support to create the most suitable enviroment for the animals that would fit their needs.<br>


                    
                </p>
                
                </div>
                </div>
                
         

            <div>

            </div>
   
                    
        
</div>
    <?php include 'includes/main-footer.php'; ?>
    
    <script src="js/shared.js"></script>
    <script src="js/google-map.js"></script>
    <script src="js/testScript.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper('.swiper-container', {
      speed: 600,
      parallax: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    </script>
    
   

    

  

</body>
</html>